<?php

namespace Modules\IncomingGood\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Services\CodeGenerator;
use Modules\IncomingGood\App\Events\IncomingGoodCreated;
use Modules\IncomingGood\App\Http\Requests\CreateIncomingGood;
use Modules\IncomingGood\App\Models\IncomingGood;
use DB;
use Auth;
use Str;

class IncomingGoodCreate extends Controller
{
    public function __construct(private IncomingGood $incomingGood)
    {
    }

    public function handle(CreateIncomingGood $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        try {
            $create = array_merge($post, [
                'incoming_number' => $post['code'] ?? CodeGenerator::generateIncomingNumber(),
                'date'            => date('Y-m-d H:i:s'),
                'created_by'      => Auth::user()->id,
            ]);

            $createIncomingGood = $this->incomingGood->create($create);

            if (isset($post['good_ids'])) {
                $details = [];
                $updateQtys = [];
                foreach ($post['good_ids'] as $key => $goodId) {
                    $details[] = [
                        'id'               => strtolower(Str::ulid()),
                        'incoming_good_id' => $createIncomingGood->id,
                        'good_id'          => $goodId,
                        'qty'              => $post['qtys'][$key],
                        'price'            => $post['prices'][$key],
                        'created_at'       => date('Y-m-d H:i:s'),
                        'updated_at'       => date('Y-m-d H:i:s'),
                    ];

                    $updateQtys[] = 0;
                }

                if (!empty($details)) {
                    $createIncomingGood->incomingGoodDetails()->insert($details);
                }

                IncomingGoodCreated::dispatch(array_column($details, 'id'), $updateQtys);
            }

            DB::commit();
            return Wrapper::data($createIncomingGood->load('incomingGoodDetails'), 'Create Incoming Good');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
