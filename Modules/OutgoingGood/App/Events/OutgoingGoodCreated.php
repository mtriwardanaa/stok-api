<?php

namespace Modules\OutgoingGood\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OutgoingGoodCreated
{
    use Dispatchable, SerializesModels;

    public $outgoingGoodDetailIds;
    public $takingGoodId;

    public function __construct(array $outgoingGoodDetailIds, string $takingGoodId)
    {
        $this->outgoingGoodDetailIds = $outgoingGoodDetailIds;
        $this->takingGoodId = $takingGoodId;
    }
}
