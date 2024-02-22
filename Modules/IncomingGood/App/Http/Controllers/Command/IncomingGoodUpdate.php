<?php

namespace Modules\IncomingGood\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\IncomingGood\App\Events\IncomingGoodDeleted;
use Modules\IncomingGood\App\Events\IncomingGoodUpdated;
use Modules\IncomingGood\App\Http\Requests\UpdateIncomingGood;
use Modules\IncomingGood\App\Http\Services\MinusUpdateChecker;
use Modules\IncomingGood\App\Models\IncomingGood;
use DB;
use Auth;
use Modules\IncomingGood\App\Models\IncomingGoodDetail;
use Str;

class IncomingGoodUpdate extends Controller
{
    public function __construct(
        private IncomingGood $incomingGood,
        private IncomingGoodDetail $incomingGoodDetail,
        private MinusUpdateChecker $minusUpdateChecker,
    ) {
    }

    public function handle(UpdateIncomingGood $request, IncomingGood $incomingGood)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        try {
            $incomingGood->update($post);
            $currentDetailIds = $incomingGood->incomingGoodDetails()->get();
            if (isset($post['good_ids'])) {
                $details = [];
                $updateQtys = [];
                foreach ($post['good_ids'] as $key => $goodId) {
                    $incomingGoodDetail = $this->incomingGoodDetail->where('incoming_good_id', $incomingGood->id)->where('good_id', $goodId)->first();

                    $this->minusUpdateChecker->check($incomingGoodDetail, $post['qtys'][$key]);

                    $details[] = [
                        'id'               => $incomingGoodDetail?->id ?? strtolower(Str::ulid()),
                        'incoming_good_id' => $incomingGood->id,
                        'good_id'          => $goodId,
                        'qty'              => $post['qtys'][$key],
                        'price'            => $post['prices'][$key],
                        'created_at'       => date('Y-m-d H:i:s'),
                        'updated_at'       => date('Y-m-d H:i:s'),
                    ];

                    $updateQtys[] = $incomingGoodDetail?->id ? $incomingGoodDetail?->qty : 0;
                }

                if (!empty($details)) {
                    $incomingGood->incomingGoodDetails()->upsert($details, ['incoming_good_id', 'good_id']);
                }

                if (!empty($currentDetailIds)) {
                    $deleteDetailIds = [];

                    foreach ($currentDetailIds as $detail) {
                        if (!in_array($detail->good_id, $post['good_ids'])) {
                            $this->minusUpdateChecker->delete($detail);
                            $deleteDetailIds[] = [
                                'id'      => $detail->id,
                                'good_id' => $detail->good_id,
                                'qty'     => $detail->qty
                            ];

                            $detail->delete();

                        }
                    }

                    if (!empty($deleteDetailIds)) {
                        IncomingGoodDeleted::dispatch($deleteDetailIds);
                    }
                }

                IncomingGoodUpdated::dispatch(array_column($details, 'id'), $updateQtys);
            }

            DB::commit();
            return Wrapper::data($incomingGood->load('incomingGoodDetails'), 'Update Incoming Good');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
