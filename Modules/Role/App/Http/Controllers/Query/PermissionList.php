<?php

namespace Modules\Role\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Role\App\Models\Permission;

class PermissionList extends Controller
{
    public function __construct(private Permission $permission)
    {
    }

    public function handle(Request $request)
    {
        return Wrapper::data($this->permission->get()->toArray(), 'Permission List');
    }

    public function detail(Permission $permission)
    {
        return Wrapper::data($permission, 'Permission Detail');
    }
}
