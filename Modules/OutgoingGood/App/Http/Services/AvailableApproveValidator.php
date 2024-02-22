<?php

namespace Modules\OutgoingGood\App\Http\Services;

use App\Exceptions\ValidatorException;
use Modules\TakingGood\App\Models\TakingGood;

class AvailableApproveValidator
{
    public function __construct(private TakingGood $takingGood)
    {
    }

    public function apply(string $takingGoodId)
    {
        $takingGood = $this->takingGood->where(['id' => $takingGoodId, 'status' => 'open'])->first();
        if (empty($takingGood)) {
            throw new ValidatorException("Taking good must be in open status.", 422);
        }
    }
}
