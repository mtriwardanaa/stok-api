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
        $outgoingGoods = $this->outgoingGood->with('userCreate', 'takingGood');
        $status = $request->get('status');
        if (isset($status)) {
            $outgoingGoods->where('status', $status);
        }

        return Wrapper::data($outgoingGoods->get()->toArray(), 'Outgoing Good List');
    }

    public function detail(OutgoingGood $outgoingGood)
    {
        return Wrapper::data($outgoingGood->load('outgoingGoodDetails.good'), 'Outgoing Good Detail');
    }
}
