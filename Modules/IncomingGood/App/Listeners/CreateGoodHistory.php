<?php

namespace Modules\IncomingGood\App\Listeners;

use Modules\Good\App\Models\GoodHistory;
use Modules\IncomingGood\App\Events\IncomingGoodCreated;
use Modules\IncomingGood\App\Events\IncomingGoodUpdated;
use Modules\IncomingGood\App\Models\IncomingGoodDetail;
use Str;

class CreateGoodHistory
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;


    public function __construct(
        private IncomingGoodDetail $incomingGoodDetail,
        private GoodHistory $goodHistory,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(IncomingGoodCreated|IncomingGoodUpdated $event): void
    {
        $incomingGoodDetails = $this->incomingGoodDetail->with('good')->whereIn('id', $event->incomingGoodDetailIds)->get()->toArray();

        if (!empty($incomingGoodDetails)) {
            $histories = [];

            foreach ($incomingGoodDetails as $incomingGoodDetail) {
                $histories[] = [
                    'id'           => strtolower(Str::ulid()),
                    'good_id'      => $incomingGoodDetail['good_id'],
                    'reference_id' => $incomingGoodDetail['id'],
                    'type'         => 'Incoming',
                    'qty'          => $incomingGoodDetail['qty']
                ];
            }

            if (!empty($histories)) {
                $this->goodHistory->upsert($histories, ['reference_id']);
            }
        }
    }
}
