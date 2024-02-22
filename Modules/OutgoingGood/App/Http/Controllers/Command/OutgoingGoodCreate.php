<?php

namespace Modules\OutgoingGood\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Services\CodeGenerator;
use Modules\OutgoingGood\App\Events\OutgoingGoodCreated;
use Modules\OutgoingGood\App\Http\Requests\CreateOutgoingGood;
use Modules\OutgoingGood\App\Http\Services\AvailableApproveValidator;
use Modules\OutgoingGood\App\Models\OutgoingGood;
use DB;
use Auth;
use Str;

class OutgoingGoodCreate extends Controller
{
    public function __construct(
        private OutgoingGood $outgoingGood,
        private AvailableApproveValidator $availableApproveValidator,
    ) {
    }

    public function handle(CreateOutgoingGood $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        try {
            $this->availableApproveValidator->apply($post['taking_good_id']);

            $create = array_merge($post, [
                'outgoing_number' => $post['code'] ?? CodeGenerator::generateOutgoingNumber(),
                'taking_good_id'  => $post['taking_good_id'],
                'date'            => date('Y-m-d H:i:s'),
                'created_by'      => Auth::user()->id,
            ]);

            $createOutgoingGood = $this->outgoingGood->create($create);

            if (isset($post['good_ids'])) {
                $details = [];
                foreach ($post['good_ids'] as $key => $goodId) {
                    $details[] = [
                        'id'                    => strtolower(Str::ulid()),
                        'outgoing_good_id'      => $createOutgoingGood->id,
                        'taking_good_detail_id' => $post['taking_good_detail_ids'][$key],
                        'good_id'               => $goodId,
                        'qty'                   => $post['qtys'][$key],
                        'price'                 => $post['prices'][$key],
                        'created_at'            => date('Y-m-d H:i:s'),
                        'updated_at'            => date('Y-m-d H:i:s'),
                    ];
                }

                if (!empty($details)) {
                    $createOutgoingGood->outgoingGoodDetails()->insert($details);
                }

                OutgoingGoodCreated::dispatch(array_column($details, 'id'), $post['taking_good_id']);
            }

            DB::commit();
            return Wrapper::data($createOutgoingGood->load('outgoingGoodDetails'), 'Create Outgoing Good');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
