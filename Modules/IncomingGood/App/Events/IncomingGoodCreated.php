<?php

namespace Modules\IncomingGood\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IncomingGoodCreated
{
    use Dispatchable, SerializesModels;

    public $incomingGoodDetailIds;

    public function __construct(array $incomingGoodDetailIds)
    {
        $this->incomingGoodDetailIds = $incomingGoodDetailIds;
    }
}
