<?php

namespace Modules\OutgoingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Good\App\Models\Good;
use Modules\TakingGood\App\Models\TakingGoodDetail;

/**
 * Class OutgoingGoodDetail
 *
 * @property string $id
 * @property string $outgoing_good_id
 * @property string $taking_good_detail_id
 * @property string $good_id
 * @property string $qty
 * @property string $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Good $good
 * @property OutgoingGood $outgoing_good
 * @property TakingGoodDetail $taking_good_detail
 *
 * @package Modules\OutgoingGood\App\Models
 */
class OutgoingGoodDetail extends Model
{
    protected $table = 'outgoing_good_details';
    public $incrementing = false;

    protected $fillable = [
        'outgoing_good_id',
        'taking_good_detail_id',
        'good_id',
        'qty',
        'price'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }

    public function outgoingGood()
    {
        return $this->belongsTo(OutgoingGood::class);
    }

    public function takingGoodDetail()
    {
        return $this->belongsTo(TakingGoodDetail::class);
    }
}
