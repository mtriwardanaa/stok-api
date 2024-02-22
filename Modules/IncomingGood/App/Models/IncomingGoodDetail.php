<?php

namespace Modules\IncomingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Modules\Good\App\Models\Good;

/**
 * Class IncomingGoodDetail
 *
 * @property string $id
 * @property string $incoming_good_id
 * @property string $good_id
 * @property string $qty
 * @property string $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Good $good
 * @property IncomingGood $incoming_good
 *
 * @package Modules\IncomingGood\App\Models
 */
class IncomingGoodDetail extends Model
{
    use HasUlids;

    protected $table = 'incoming_good_details';
    public $incrementing = false;

    protected $fillable = [
        'incoming_good_id',
        'good_id',
        'qty',
        'price',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }

    public function incomingGood()
    {
        return $this->belongsTo(IncomingGood::class);
    }
}
