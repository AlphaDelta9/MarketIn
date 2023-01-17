<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginToken
 * 
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class LoginToken extends Model
{
	protected $table = 'login_tokens';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'user_id',
		'token'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
