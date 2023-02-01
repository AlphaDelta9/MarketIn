<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property string $name
 * 
 * @property Collection|ProjectHeader[] $project_headers
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	protected $primaryKey = 'name';
	public $incrementing = false;
	public $timestamps = false;

	public function project_headers()
	{
		return $this->hasMany(ProjectHeader::class, 'city_name');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'city_name');
	}
}
