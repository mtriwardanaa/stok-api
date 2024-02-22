<?php

namespace Modules\IncomingGood\App\Listeners;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Modules\Good\App\Models\Good;
use Modules\IncomingGood\App\Events\IncomingGoodCreated;
use Modules\IncomingGood\App\Events\IncomingGoodDeleted;
use Modules\IncomingGood\App\Events\IncomingGoodUpdated;
use Modules\IncomingGood\App\Models\IncomingGoodDetail;

class UpdateGoodQty implements ShouldHandleEventsAfterCommit
{
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
    public function handle(IncomingGoodCreated|IncomingGoodUpdated|IncomingGoodDeleted $event): void
    {
        if ($event instanceof IncomingGoodDeleted) {
            foreach ($event->payload as $payload) {
                $good = $this->good->findOrFail($payload['good_id']);
                $this->good->where('id', $payload['good_id'])->update(['qty' => $good->qty - $payload['qty']]);
            }
        } else {
            $incomingGoodDetails = $this->incomingGoodDetail->with(['good'])->whereIn('id', $event->incomingGoodDetailIds)->get();

            if (!empty($incomingGoodDetails)) {
                foreach ($incomingGoodDetails as $key => $incomingGoodDetail) {
                    $good = $this->good->findOrFail($incomingGoodDetail['good_id']);

                    $this->good->where('id', $incomingGoodDetail['good_id'])->update(['qty' => $good->qty - $event->updateQtys[$key] + $incomingGoodDetail['qty']]);
                }
            }
        }
    }
}
