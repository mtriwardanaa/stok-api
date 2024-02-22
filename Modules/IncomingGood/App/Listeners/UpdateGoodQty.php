<?php

namespace Modules\IncomingGood\App\Listeners;

use Modules\Good\App\Models\Good;
use Modules\IncomingGood\App\Events\IncomingGoodCreated;
use Modules\IncomingGood\App\Models\IncomingGoodDetail;

class UpdateGoodQty
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;


    public function __construct(
        private IncomingGoodDetail $incomingGoodDetail,
        private Good $good,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(IncomingGoodCreated $event): void
    {
        $incomingGoodDetails = $this->incomingGoodDetail->with(['good'])->whereIn('id', $event->incomingGoodDetailIds)->get();

        if (!empty($incomingGoodDetails)) {
            foreach ($incomingGoodDetails as $incomingGoodDetail) {
                $good = $this->good->findOrFail($incomingGoodDetail['good_id']);
                $this->good->where('id', $incomingGoodDetail['good_id'])->update(['qty' => $good->qty + $incomingGoodDetail['qty']]);
            }
        }
    }
}
