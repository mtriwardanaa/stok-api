<?php

namespace Modules\Role\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\App\Models\User;

/**
 * Class PermissionUser
 *
 * @property string $user_id
 * @property string $permission_id
 *
 * @property Permission $permission
 * @property User $user
 *
 * @package Modules\Role\App\Models
 */
class PermissionUser extends Model
{
    protected $table = 'permission_users';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'permission_id',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
