<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectDetail
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $project_header_id
 * @property int $user_id
 * @property string|null $deleted_at
 * @property Carbon|null $accepted_at
 * @property Carbon|null $rejected_at
 *
 * @property ProjectHeader $project_header
 * @property User $user
 *
 * @package App\Models
 */
class ProjectDetail extends Model
{
	use SoftDeletes;
	protected $table = 'project_details';

	protected $casts = [
		'project_header_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'accepted_at',
		'rejected_at'
	];

	protected $fillable = [
		'project_header_id',
		'user_id',
		'accepted_at',
		'rejected_at'
	];

	public function project_header()
	{
		return $this->belongsTo(ProjectHeader::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
