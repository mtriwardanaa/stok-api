<?php

namespace Modules\OutgoingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\TakingGood\App\Models\TakingGood;
use Modules\User\App\Models\User;

/**
 * Class OutgoingGood
 *
 * @property string $id
 * @property string $taking_good_id
 * @property string $outgoing_number
 * @property Carbon $date
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User|null $user
 * @property TakingGood $taking_good
 * @property Collection|OutgoingGoodDetail[] $outgoing_good_details
 *
 * @package Modules\OutgoingGood\App\Models
 */
class OutgoingGood extends Model
{
    use SoftDeletes, HasUlids;
    protected $table = 'outgoing_goods';
    public $incrementing = false;

    protected $fillable = [
        'taking_good_id',
        'outgoing_number',
        'date',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'date'       => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function takingGood()
    {
        return $this->belongsTo(TakingGood::class);
    }

    public function outgoingGoodDetails()
    {
        return $this->hasMany(OutgoingGoodDetail::class);
    }
}
