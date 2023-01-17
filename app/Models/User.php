<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|LoginToken[] $login_tokens
 * @property Collection|ProjectDetail[] $project_details
 * @property Collection|ProjectHeader[] $project_headers
 *
 * @package App\Models
 */
class User extends AuthUser
{
    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';

	protected $casts = [
		'role' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'role'
	];

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
