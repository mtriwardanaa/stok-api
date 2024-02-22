<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OutgoingGoodDetail
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
 * @package App\Models
 */
class OutgoingGoodDetail extends Model
{
	protected $table = 'outgoing_good_details';
	public $incrementing = false;

	protected $fillable = [
		'incoming_good_id',
		'good_id',
		'qty',
		'price'
	];

	public function good()
	{
		return $this->belongsTo(Good::class);
	}

	public function incoming_good()
	{
		return $this->belongsTo(IncomingGood::class);
	}
}
