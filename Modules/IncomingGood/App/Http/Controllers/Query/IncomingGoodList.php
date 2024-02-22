<?php

namespace Modules\IncomingGood\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\IncomingGood\App\Models\IncomingGood;

class IncomingGoodList extends Controller
{
    public function __construct(private IncomingGood $incomingGood)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->incomingGood->get()->toArray(), 'Incoming Good List');
    }

    public function detail(IncomingGood $incomingGood)
    {
        return Wrapper::data($incomingGood, 'Incoming Good Detail');
    }
}
