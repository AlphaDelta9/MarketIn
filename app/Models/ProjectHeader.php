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
 * Class ProjectHeader
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property string $city_name
 * @property string|null $deleted_at
 * @property Carbon|null $finished_at
 * 
 * @property City $city
 * @property User $user
 * @property Collection|ProjectDetail[] $project_details
 *
 * @package App\Models
 */
class ProjectHeader extends Model
{
	use SoftDeletes;
	protected $table = 'project_headers';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'finished_at'
	];

	protected $fillable = [
		'title',
		'description',
		'user_id',
		'city_name',
		'finished_at'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city_name');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function project_details()
	{
		return $this->hasMany(ProjectDetail::class);
	}
}
