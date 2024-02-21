<?php

namespace Modules\Token\App\Http\Services;

use App\Exceptions\ValidatorException;
use Modules\User\App\Models\User;

class PermissionValidator
{
    public function check(User $user)
    {
        if (count($user?->permissions) < 1) {
            throw new ValidatorException("You don't have any access, please contact admin.", 401);
        }
    }
}
