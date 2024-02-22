<?php

namespace Modules\IncomingGood\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IncomingGoodUpdated
{
    use Dispatchable, SerializesModels;

    public $incomingGoodDetailIds;
    public $updateQtys;

    public function __construct(array $incomingGoodDetailIds, array $updateQtys)
    {
        $this->incomingGoodDetailIds = $incomingGoodDetailIds;
        $this->updateQtys = $updateQtys;
    }
}
