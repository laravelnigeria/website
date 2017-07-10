<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\{
    Eloquent\Model,
    Eloquent\Builder,
    Eloquent\Relations\BelongsTo
};

class Post extends Model {

    use Taggable;

    /**
     * {@inheritDoc}
     */
    protected $fillable = ['slug', 'title', 'excerpt', 'body', 'category_id', 'published', 'publish_date'];

    /**
     * {@inheritDoc}
     */
    protected $casts = ['published' => 'boolean'];

    /**
     * {@inheritDoc}
     */
    protected $dates = ['publish_date'];

    /**
     * {@inheritDoc}
     */
    protected $with = ['tagged'];

    /**
     * Get the published posts.
     *
     * @param  $query Builder
     * @return Builder
     */
    public function scopePublished(Builder $query) : Builder
    {
        return $query->wherePublished(true)->whereNotNull('publish_date');
    }

    /**
     * Returns the post category the post belongs to.
     *
     * @return BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
