<?php

namespace Modules\Good\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodHistory
 *
 * @property string $id
 * @property string $good_id
 * @property string $reference_id
 * @property string $type
 * @property string $qty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package Modules\Good\App\Models
 */
class GoodHistory extends Model
{
    use HasUlids;

    protected $table = 'good_histories';
    public $incrementing = false;

    protected $fillable = [
        'good_id',
        'reference_id',
        'type',
        'qty',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
