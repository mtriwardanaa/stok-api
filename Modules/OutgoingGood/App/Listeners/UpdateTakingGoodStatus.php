<?php

namespace Modules\OutgoingGood\App\Listeners;

use App\Helper\ValueObject\TakingGoodStatus;
use Modules\OutgoingGood\App\Events\OutgoingGoodCreated;
use Modules\TakingGood\App\Models\TakingGood;

class UpdateTakingGoodStatus
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(
        private TakingGood $takingGood,
    ) {
    }
    /**
     * Handle the event.
     */
    public function handle(OutgoingGoodCreated $event): void
    {
        $takingGood = $this->takingGood->where('id', $event->takingGoodId)->firstOrFail();

        if (!empty($takingGood)) {
            $takingGood->status = TakingGoodStatus::APPROVE->value;
            $takingGood->save();
        }
    }
}
