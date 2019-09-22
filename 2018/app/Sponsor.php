<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'level',
        'responsible_for',
        'logo',
        'link',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'level' => 'int',
    ];

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = false;

    /**
     * Get all the sponsors.
     *
     * @param $query
     * @return mixed
     */
    public function scopeOrderedByLevel($query)
    {
        return $query->orderBy('level', 'desc');
    }
}
