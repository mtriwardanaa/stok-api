<?php

namespace Modules\IncomingGood\App\Http\Services;

use App\Exceptions\ValidatorException;
use Modules\Good\App\Models\Good;
use Modules\IncomingGood\App\Models\IncomingGoodDetail;

class MinusUpdateChecker
{
    public function __construct(
        private Good $good,
        private IncomingGoodDetail $incomingGoodDetail,
    ) {
    }

    public function check(?IncomingGoodDetail $incomingGoodDetail, string $updateQty)
    {
        if (!empty($incomingGoodDetail)) {
            $good = $this->good->findOrFail($incomingGoodDetail->good_id);
            if ($good->qty - $incomingGoodDetail->qty + $updateQty < 0) {
                throw new ValidatorException("The total stock available is insufficient.", 422);
            }
        }
    }

    public function delete(IncomingGoodDetail $incomingGoodDetail)
    {
        $good = $this->good->findOrFail($incomingGoodDetail->good_id);
        if ($good->qty - $incomingGoodDetail->qty < 0) {
            throw new ValidatorException("The total stock available is insufficient.", 422);
        }
    }
}
