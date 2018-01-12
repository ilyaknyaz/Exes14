<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'avatar',
        'info',
        'status',
        'direction_id'
    ];

    public $timestamps = false;

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}