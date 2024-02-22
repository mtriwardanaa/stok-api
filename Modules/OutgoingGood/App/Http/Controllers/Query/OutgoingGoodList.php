<?php

namespace Modules\OutgoingGood\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\OutgoingGood\App\Models\OutgoingGood;

class OutgoingGoodList extends Controller
{
    public function __construct(private OutgoingGood $outgoingGood)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->outgoingGood->get()->toArray(), 'Outgoing Good List');
    }

    public function detail(OutgoingGood $outgoingGood)
    {
        return Wrapper::data($outgoingGood, 'Outgoing Good Detail');
    }
}
