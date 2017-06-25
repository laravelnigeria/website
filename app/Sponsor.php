<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model {

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    protected $fillable = ['name', 'logo', 'link'];

    /**
     * Get all the sponsors.
     *
     * @param $query
     * @return mixed
     */
    public function scopeTheLot($query)
    {
        return Cache::remember('sponsors', 30, function() use ($query) {
            return $query->orderBy('level', 'desc')->get();
        });
    }
}
