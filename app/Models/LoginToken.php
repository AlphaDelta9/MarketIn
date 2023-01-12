<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    protected $table = 'login_tokens';
    protected $fillable = ['user_id', 'token'];
    protected $hidden = ['user_id'];
}
