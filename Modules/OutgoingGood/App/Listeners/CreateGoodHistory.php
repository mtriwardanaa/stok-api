<?php

namespace Modules\OutgoingGood\App\Listeners;

use Modules\Good\App\Models\GoodHistory;
use Modules\OutgoingGood\App\Events\OutgoingGoodCreated;
use Modules\OutgoingGood\App\Models\OutgoingGoodDetail;
use Str;

class CreateGoodHistory
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;


    public function __construct(
        private OutgoingGoodDetail $outgoingGoodDetail,
        private GoodHistory $goodHistory,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(OutgoingGoodCreated $event): void
    {
        $outgoingGoodDetails = $this->outgoingGoodDetail->with('good')->whereIn('id', $event->outgoingGoodDetailIds)->get()->toArray();

        if (!empty($outgoingGoodDetails)) {
            $histories = [];

            foreach ($outgoingGoodDetails as $outgoingGoodDetail) {
                $histories[] = [
                    'id'           => strtolower(Str::ulid()),
                    'good_id'      => $outgoingGoodDetail['good_id'],
                    'reference_id' => $outgoingGoodDetail['id'],
                    'type'         => 'Outgoing',
                    'qty'          => $outgoingGoodDetail['qty']
                ];
            }

            if (!empty($histories)) {
                $this->goodHistory->upsert($histories, ['referece_id']);
            }
        }
    }
}
