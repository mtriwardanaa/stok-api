<?php

namespace Modules\Role\App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Role\App\Events\RoleUpdated;
use Modules\Role\App\Models\PermissionRole;
use Modules\Role\App\Models\PermissionUser;
use Modules\User\App\Models\User;

class ReassignPermissionUser implements ShouldQueue
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;

    /**
     * Create the event listener.
     */
    public function __construct(
        private User $user,
        private PermissionUser $permissionUser,
        private PermissionRole $permissionRole,
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(RoleUpdated $event): void
    {
        $users = match ($event instanceof RoleUpdated) {
            true => $this->user->where('role_id', $event->roleId)->get(),
            default => $this->user->where('id', '11')->get(),
        };

        if (count($users) > 0) {
            foreach ($users as $user) {
                $permissionsDetach = $this->permissionUser
                    ->where('user_id', $user->id)->pluck('permission_id');
                $permissionAttach = $this->permissionRole
                    ->where('role_id', $user->role_id)->pluck('permission_id');

                $user->permissions()->detach($permissionsDetach);
                $user->permissions()->attach($permissionAttach);
            }
        }
    }
}
