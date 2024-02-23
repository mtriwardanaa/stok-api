<?php

namespace Modules\Role\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Role\App\Models\Role;

class RoleList extends Controller
{
    public function __construct(private Role $role)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->role->with('permissions')->get()->toArray(), 'Role List');
    }

    public function detail(Role $role)
    {
        return Wrapper::data($role->load('permissions'), 'Role Detail');
    }
}
