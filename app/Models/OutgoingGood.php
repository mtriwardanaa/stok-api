<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OutgoingGood
 * 
 * @property string $id
 * @property string $outgoing_number
 * @property Carbon $date
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OutgoingGood extends Model
{
	protected $table = 'outgoing_goods';
	public $incrementing = false;

	protected $casts = [
		'date' => 'datetime'
	];

	protected $fillable = [
		'outgoing_number',
		'date',
		'created_by',
		'updated_by'
	];
}
