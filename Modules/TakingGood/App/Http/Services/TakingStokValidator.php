<?php

namespace Modules\TakingGood\App\Http\Services;

use App\Exceptions\ValidatorException;
use Modules\Good\App\Models\Good;

class TakingStokValidator
{
    public function __construct(private Good $good)
    {
    }

    public function apply(array $goodIds)
    {
        $goods = $this->good->whereIn('id', $goodIds)->get()->toArray();
        if (empty($goods)) {
            throw new ValidatorException("Some goods not valid.", 422);
        }

        $goodQtys = array_column($goods, 'qty');
        $goodFilters = array_filter($goodQtys, function ($value) {
            return $value <= 0;
        });

        if (!empty($goodFilters)) {
            throw new ValidatorException("Stock goods are not available.", 422);
        }
    }
}
