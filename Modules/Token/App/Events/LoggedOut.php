<?php

namespace Modules\Token\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoggedOut
{
    use Dispatchable, SerializesModels;

    public $userId;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }
}
