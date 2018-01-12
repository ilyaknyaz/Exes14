<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'points';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'members_id',
        'points',
        'created_at'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}