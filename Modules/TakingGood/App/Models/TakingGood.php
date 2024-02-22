<?php

namespace Modules\TakingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\App\Models\User;

/**
 * Class TakingGood
 *
 * @property string $id
 * @property string $taking_number
 * @property Carbon $date
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User|null $user
 * @property Collection|TakingGoodDetail[] $taking_good_details
 *
 * @package App\Models
 */
class TakingGood extends Model
{
    use SoftDeletes, HasUlids;

    protected $table = 'taking_goods';
    public $incrementing = false;


    protected $casts = [
        'date'       => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'taking_number',
        'date',
        'created_by',
        'updated_by',
        'status',
    ];

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function takingGoodDetails()
    {
        return $this->hasMany(TakingGoodDetail::class);
    }
}
