<?php

namespace Modules\IncomingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\App\Models\User;

/**
 * Class IncomingGood
 *
 * @property string $id
 * @property string $incoming_number
 * @property Carbon $date
 * @property string $supplier
 * @property string|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User|null $user
 * @property Collection|IncomingGoodDetail[] $incoming_good_details
 *
 * @package Modules\IncomingGood\App\Models
 */
class IncomingGood extends Model
{
    use SoftDeletes, HasUlids;

    protected $table = 'incoming_goods';
    public $incrementing = false;

    protected $casts = [
        'date'       => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'incoming_number',
        'date',
        'supplier',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function incomingGoodDetails()
    {
        return $this->hasMany(IncomingGoodDetail::class);
    }
}
