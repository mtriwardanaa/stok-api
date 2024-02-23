<?php

namespace Modules\Good\App\Http\Controllers\Good\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Good\App\Models\Good;

class GoodList extends Controller
{
    public function __construct(private Good $good)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->good->with('unit')->get()->toArray(), 'Good List');
    }

    public function detail(Good $good)
    {
        return Wrapper::data($good, 'Good Detail');
    }
}
