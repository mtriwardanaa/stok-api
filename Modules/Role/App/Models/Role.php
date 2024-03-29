<?php

namespace Modules\Role\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\App\Models\User;

/**
 * Class Role
 *
 * @property string $id
 * @property string $name
 * @property string $label
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package Modules\Role\App\Models
 */
class Role extends Model
{
    use SoftDeletes, HasUlids;

    protected $table = 'roles';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'label'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles');
    }
}
