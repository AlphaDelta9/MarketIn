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
 * @property string $type_name
 * @property string $city_name
 * @property string $picture
 * @property string $mime
 * @property string|null $asset
 * @property string|null $type
 * @property Carbon $work
 * @property int $budget
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
		'user_id' => 'int',
		'budget' => 'int'
	];

	protected $dates = [
		'work',
		'finished_at'
	];

	protected $fillable = [
		'title',
		'description',
		'user_id',
		'type_name',
		'city_name',
		'picture',
		'mime',
		'asset',
		'type',
		'work',
		'budget',
		'finished_at'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city_name');
	}

	public function type()
	{
		return $this->belongsTo(Type::class, 'type_name');
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
