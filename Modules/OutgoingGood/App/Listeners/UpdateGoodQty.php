<?php

namespace Modules\OutgoingGood\App\Listeners;

use Modules\Good\App\Models\Good;
use Modules\OutgoingGood\App\Events\OutgoingGoodCreated;
use Modules\OutgoingGood\App\Models\OutgoingGoodDetail;

class UpdateGoodQty
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(
        private OutgoingGoodDetail $outgoingGoodDetail,
        private Good $good,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(OutgoingGoodCreated $event): void
    {
        $outgoingGoodDetails = $this->outgoingGoodDetail->with(['good'])->whereIn('id', $event->outgoingGoodDetailIds)->get();

        if (!empty($outgoingGoodDetails)) {
            foreach ($outgoingGoodDetails as $outgoingGoodDetail) {
                $good = $this->good->findOrFail($outgoingGoodDetail['good_id']);
                $this->good->where('id', $outgoingGoodDetail['good_id'])->update(['qty' => $good->qty - $outgoingGoodDetail['qty']]);
            }
        }
    }
}
