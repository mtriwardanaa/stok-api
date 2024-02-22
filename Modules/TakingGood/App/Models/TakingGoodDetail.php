<?php

namespace Modules\TakingGood\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Good\App\Models\Good;

/**
 * Class TakingGoodDetail
 *
 * @property string $id
 * @property string $taking_good_id
 * @property string $good_id
 * @property string $qty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Good $good
 * @property TakingGood $taking_good
 *
 * @package Modules\TakingGood\App\Models
 */
class TakingGoodDetail extends Model
{
    protected $table = 'taking_good_details';
    public $incrementing = false;

    protected $fillable = [
        'taking_good_id',
        'good_id',
        'qty',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }

    public function taking_good()
    {
        return $this->belongsTo(TakingGood::class);
    }
}
