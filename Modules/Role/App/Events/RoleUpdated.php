<?php

namespace Modules\Role\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RoleUpdated
{
    use Dispatchable, SerializesModels;

    public $roleId;

    public function __construct(string $roleId)
    {
        $this->roleId = $roleId;
    }
}
