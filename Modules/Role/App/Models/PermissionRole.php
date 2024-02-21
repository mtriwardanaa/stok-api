<?php

namespace Modules\Role\App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionRole
 *
 * @property string $role_id
 * @property string $permission_id
 *
 * @property Permission $permission
 * @property Role $role
 *
 * @package Modules\Role\App\Models
 */
class PermissionRole extends Model
{
    protected $table = 'permission_roles';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
