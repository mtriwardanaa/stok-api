<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TakingGood
 * 
 * @property string $id
 * @property string $taking_number
 * @property Carbon $date
 * @property string|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 * @property Collection|TakingGoodDetail[] $taking_good_details
 *
 * @package App\Models
 */
class TakingGood extends Model
{
	use SoftDeletes;
	protected $table = 'taking_goods';
	public $incrementing = false;

	protected $casts = [
		'date' => 'datetime'
	];

	protected $fillable = [
		'taking_number',
		'date',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function taking_good_details()
	{
		return $this->hasMany(TakingGoodDetail::class);
	}
}
