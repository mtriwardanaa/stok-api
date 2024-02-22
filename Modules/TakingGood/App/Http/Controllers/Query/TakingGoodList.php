<?php

namespace Modules\TakingGood\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TakingGood\App\Models\TakingGood;

class TakingGoodList extends Controller
{
    public function __construct(private TakingGood $takingGood)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->takingGood->get()->toArray(), 'Taking Good List');
    }

    public function detail(TakingGood $takingGood)
    {
        return Wrapper::data($takingGood, 'Taking Good Detail');
    }
}
