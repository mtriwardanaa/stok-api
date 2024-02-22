<?php

namespace Modules\Good\App\Http\Controllers\Unit\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Models\Unit;

class UnitDelete extends Controller
{
    public function handle(Unit $unit)
    {
        try {
            return Wrapper::data($unit->delete(), 'Delete Unit');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
