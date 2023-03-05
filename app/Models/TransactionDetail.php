<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionDetail
 * 
 * @property int $id
 * @property int $transaction_id
 * @property int $price
 * @property string $is_verified
 * 
 * @property Transaction $transaction
 *
 * @package App\Models
 */
class TransactionDetail extends Model
{
	protected $table = 'transaction_details';
	public $timestamps = false;

	protected $casts = [
		'transaction_id' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'transaction_id',
		'price',
		'is_verified'
	];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}
}
