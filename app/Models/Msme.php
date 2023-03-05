<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Msme
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $location
 * @property string $description
 * @property string $picture
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Msme extends Model
{
	protected $table = 'msmes';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'location',
		'description',
		'picture',
		'remember_token'
	];
}
