<?php

namespace Modules\OutgoingGood\App\Http\Services;

use App\Exceptions\ValidatorException;
use Modules\Good\App\Models\Good;
use Modules\TakingGood\App\Models\TakingGood;

class AvailableApproveValidator
{
    public function __construct(
        private TakingGood $takingGood,
        private Good $good,
    ) {
    }

    public function apply(string $takingGoodId)
    {
        $takingGood = $this->takingGood->where(['id' => $takingGoodId, 'status' => 'open'])->first();
        if (empty($takingGood)) {
            throw new ValidatorException("Taking good must be in open status.", 422);
        }
    }

    public function stok(string $goodId, string $qty)
    {
        $good = $this->good->findOrFail($goodId);
        if ($good->qty - $qty < 0) {
            throw new ValidatorException("The total stock available is insufficient.", 422);
        }
    }
}
