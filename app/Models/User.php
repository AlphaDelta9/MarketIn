<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool|null $role
 * @property string $city_name
 * @property string $profile
 * @property string $picture
 * @property string $mime
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City $city
 * @property Collection|LoginToken[] $login_tokens
 * @property Collection|ProjectDetail[] $project_details
 * @property Collection|ProjectHeader[] $project_headers
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'role' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'role',
		'city_name',
		'profile',
		'picture',
		'mime',
		'remember_token'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city_name');
	}

	public function login_tokens()
	{
		return $this->hasMany(LoginToken::class);
	}

	public function project_details()
	{
		return $this->hasMany(ProjectDetail::class);
	}

	public function project_headers()
	{
		return $this->hasMany(ProjectHeader::class);
	}
}
