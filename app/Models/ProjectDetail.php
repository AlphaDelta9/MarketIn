<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_header_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property ProjectHeader $projectHeader
 */
class ProjectDetail extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['project_header_id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectHeader()
    {
        return $this->belongsTo('App\Models\ProjectHeader');
    }
}
