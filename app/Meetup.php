<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $fillable = ['event_id'];

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * Define the relationship with the Speaker resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}
