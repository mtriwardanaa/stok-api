<?php

namespace Modules\IncomingGood\App\Listeners;

use Modules\Good\App\Models\GoodHistory;
use Modules\IncomingGood\App\Events\IncomingGoodDeleted;

class DeleteGoodHistory
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;


    public function __construct(
        private GoodHistory $goodHistory,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(IncomingGoodDeleted $event): void
    {
        foreach ($event->payload as $data) {
            $this->goodHistory->where('reference_id', $data['id'])->delete();
        }
    }
}
