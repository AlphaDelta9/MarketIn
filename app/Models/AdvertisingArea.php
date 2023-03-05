<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdvertisingArea
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class AdvertisingArea extends Model
{
	protected $table = 'advertising_areas';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
