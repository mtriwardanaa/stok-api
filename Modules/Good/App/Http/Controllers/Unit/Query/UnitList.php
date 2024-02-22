<?php

namespace Modules\Good\App\Http\Controllers\Unit\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Good\App\Models\Unit;

class UnitList extends Controller
{
    public function __construct(private Unit $unit)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->unit->get()->toArray(), 'Unit List');
    }

    public function detail(Unit $unit)
    {
        return Wrapper::data($unit, 'Unit Detail');
    }
}
