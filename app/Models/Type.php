<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * 
 * @property string $name
 * @property string $icon
 * 
 * @property Collection|ProjectHeader[] $project_headers
 *
 * @package App\Models
 */
class Type extends Model
{
	protected $table = 'types';
	protected $primaryKey = 'name';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'icon'
	];

	public function project_headers()
	{
		return $this->hasMany(ProjectHeader::class, 'type_name');
	}
}
