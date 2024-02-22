<?php

namespace Modules\TakingGood\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\ValueObject\TakingGoodStatus;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Services\CodeGenerator;
use Modules\TakingGood\App\Http\Requests\CreateTakingGood;
use Modules\TakingGood\App\Http\Services\TakingStokValidator;
use Modules\TakingGood\App\Models\TakingGood;
use Auth;
use DB;
use Str;

class TakingGoodCreate extends Controller
{
    public function __construct(
        private TakingGood $takingGood,
        private TakingStokValidator $takingStokValidator,
    ) {
    }

    public function handle(CreateTakingGood $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();
        try {
            $create = array_merge($post, [
                'taking_number' => $post['code'] ?? CodeGenerator::generateTakingNumber(),
                'created_by'    => Auth::user()->id,
                'date'          => date('Y-m-d H:i:s'),
                'status'        => TakingGoodStatus::OPEN->value
            ]);

            $createTakingGood = $this->takingGood->create($create);

            if (isset($post['good_ids'])) {
                $this->takingStokValidator->apply($post['good_ids']);

                $details = [];
                foreach ($post['good_ids'] as $key => $goodId) {
                    $details[] = [
                        'id'             => strtolower(Str::ulid()),
                        'taking_good_id' => $createTakingGood->id,
                        'good_id'        => $goodId,
                        'qty'            => $post['qtys'][$key],
                        'created_at'     => date('Y-m-d H:i:s'),
                        'updated_at'     => date('Y-m-d H:i:s'),
                    ];
                }

                if (!empty($details)) {
                    $createTakingGood->takingGoodDetails()->insert($details);
                }
            }

            DB::commit();
            return Wrapper::data($createTakingGood->load('takingGoodDetails'), 'Create Taking Good');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
