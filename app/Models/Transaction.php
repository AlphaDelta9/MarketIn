<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property string $title
 * @property string $status
 * @property int $project_detail_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ProjectDetail $project_detail
 * @property Collection|TransactionDetail[] $transaction_details
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $casts = [
		'project_detail_id' => 'int'
	];

	protected $fillable = [
		'title',
		'status',
		'project_detail_id'
	];

	public function project_detail()
	{
		return $this->belongsTo(ProjectDetail::class);
	}

	public function transaction_details()
	{
		return $this->hasMany(TransactionDetail::class);
	}
}
