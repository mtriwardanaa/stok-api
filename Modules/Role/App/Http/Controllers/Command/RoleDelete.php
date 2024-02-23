<?php

namespace Modules\Role\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Role\App\Models\Role;

class RoleDelete extends Controller
{
    public function handle(Role $role)
    {
        try {
            $role->delete();
            return Wrapper::data($role, 'Delete Role');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }

    }
}
