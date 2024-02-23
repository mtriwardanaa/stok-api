<?php

namespace Modules\Role\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Role\App\Events\RoleUpdated;
use Modules\Role\App\Http\Requests\UpdateRole;
use Modules\Role\App\Models\PermissionRole;
use Modules\Role\App\Models\Role;
use DB;

class RoleUpdate extends Controller
{
    public function __construct(
        private Role $role,
        private PermissionRole $permissionRole,
    ) {
    }

    public function handle(UpdateRole $request, Role $role)
    {
        DB::beginTransaction();
        $post = $request->json()->all();
        try {
            $update = array_merge($post, [
                'name' => strtolower($post['name']),
            ]);

            $attachRolePermission = $post['permission_ids'];
            $detachRolePermissions = $this->permissionRole->where('role_id', $role->id)->pluck('permission_id');

            $role->update($update);
            $role->permissions()->detach($detachRolePermissions);
            $role->permissions()->attach($attachRolePermission);

            RoleUpdated::dispatch($role->id);

            DB::commit();
            return Wrapper::data($role, 'Update Role');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
