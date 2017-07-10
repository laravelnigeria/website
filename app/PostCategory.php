<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model {

    /**
     * {@inheritDoc}
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the posts the category contains.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
