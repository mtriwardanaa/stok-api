<?php

namespace Modules\Role\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Permission
 *
 * @property string $id
 * @property string $name
 * @property string $label
 * @property string|null $description
 * @property string $guard
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Role[] $roles
 * @property Collection|User[] $users
 *
 * @package Modules\Role\App\Models
 */
class Permission extends Model
{
    use SoftDeletes;
    protected $table = 'permissions';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'label',
        'description',
        'guard',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_roles');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_users');
    }
}
