<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class Talk extends Model
{
    /**
     * @var integer
     */
    const CACHE_MINUTES = 5;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'user_id',
        'meetup_id',
        'topic',
        'overview',
        'accepted',
    ];

    /**
     * {@inheritDoc}
     */
    protected $with = ['user'];

    /**
     * {@inheritDoc}
     */
    protected $casts = ['accepted' => 'bool'];

    /**
     * Return all talks grouped by the event
     *
     * @param  $query
     * @return Collection
     */
    public function scopeOrganisedByMeetup($query) : Collection
    {
        return Cache::remember('all_talks.organised', static::CACHE_MINUTES, function () use ($query) {
            $talks = $query->accepted()->with('meetup')->orderBy('created_at', 'desc')->get();

            $meetups = [];

            foreach ($talks as $talk) {
                $meetups[$talk->meetup->id]['talks'][] = $talk;

                if ( ! array_get($meetups[$talk->meetup->id], 'details')) {
                    $meetups[$talk->meetup->id]['details'] = $talk->meetup->getEventDetails();
                }
            }

            return new Collection($meetups);
        });
    }

    /**
     * Return accepted talks only.
     *
     * @param $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeAccepted($query)
    {
        return $query->whereAccepted(true);
    }

    /**
     * Define the relationship with the User resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Meetup resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meetup()
    {
        return $this->belongsTo(Meetup::class);
    }
}
