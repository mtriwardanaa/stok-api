<?php

namespace Modules\Good\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Good
 *
 * @property string $id
 * @property string|null $unit_id
 * @property string $name
 * @property string $price
 * @property string $qty
 * @property string $qty_warning
 * @property string $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Unit|null $unit
 *
 * @package Modules\Good\App\Models
 */
class Good extends Model
{
    use SoftDeletes, HasUlids;

    protected $table = 'goods';
    public $incrementing = false;

    protected $fillable = [
        'unit_id',
        'name',
        'price',
        'qty',
        'qty_warning',
        'code',
    ];

    protected $attributes = [
        'qty'         => 0,
        'qty_warning' => 0,
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
