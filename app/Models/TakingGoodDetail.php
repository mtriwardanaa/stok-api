<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
 * @package App\Models
 */
class TakingGoodDetail extends Model
{
	protected $table = 'taking_good_details';
	public $incrementing = false;

	protected $fillable = [
		'taking_good_id',
		'good_id',
		'qty'
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
