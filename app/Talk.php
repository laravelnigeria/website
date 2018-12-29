<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talk extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'meetup_id',
        'topic',
        'overview',
        'video_url',
        'slides_url',
        'accepted',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'accepted' => 'bool',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'overviewHtml',
    ];

    /**
     * Return all talks grouped by the event
     *
     * @return \Illuminate\Support\Collection
     */
    public function organisedByMeetup(): \Illuminate\Support\Collection
    {
        $talks = $this->accepted()
            ->ordered()
            ->with(['meetup' => function ($query) {
                $query->without('talks');
            }])
            ->get();

        $meetups = collect([]);

        // TODO: Higher-order functions
        $talks->each(function ($talk) use ($meetups) {
            $id = $talk->meetup->id;

            if ($meetups->has($id) === false) {
                $meetups[$id] = collect(['talks' => collect([]), 'details' => collect([])]);
            }

            $meetups[$id]['talks']->push($talk);

            if ($meetups[$id]['details']->isEmpty()) {
                $meetups[$id]['details'] = $talk->meetup->getEventDetails();
            }
        });

        return $meetups;
    }

    /**
     * Returns the HTML representation of the overview.
     *
     * @return string
     */
    public function getOverviewHtmlAttribute(): string
    {
        return nl2p(htmlspecialchars($this->attributes['overview']));
    }

    /**
     * Return accepted talks only.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAccepted($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('accepted', true);
    }

    /**
     * Return ordered query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->orderBy('id', 'desc');
    }

    /**
     * Define the relationship with the User resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class)->with('profile');
    }

    /**
     * Define the relationship with the Meetup resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meetup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Meetup::class);
    }
}
