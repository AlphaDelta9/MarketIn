<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialBranding
 * 
 * @property int $id
 * @property string $name
 * @property string $note
 * @property string $type
 *
 * @package App\Models
 */
class MaterialBranding extends Model
{
	protected $table = 'material_brandings';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'note',
		'type'
	];
}
