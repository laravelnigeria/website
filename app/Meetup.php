<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent;
use App\Facades\MeetupApi as Api;
use Illuminate\Support\Facades\Cache;

class Meetup extends Eloquent\Model
{
    /**
     * @var integer
     */
    const CACHE_MINUTES = 5;

    /**
     * {@inheritDoc}
     */
    protected $fillable = ['event_id'];

    /**
     * {@inheritDoc}
     */
    protected $with = ['talks'];

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * Get the group details.
     *
     * @return \Illuminate\Support\Collection
     */
    public function groupDetails()
    {
        return Cache::remember('meetup.group', static::CACHE_MINUTES, function () {
            $group = Api::getGroupDetails();

            $group->put('created_object', Carbon::createFromTimestamp($group->get('created') / 1000)
                ->timezone($group->get('timezone'))
            );

            return $group;
        });
    }

    /**
     * Get the group details with full details on the next event.
     *
     * @return \Illuminate\Support\Collection
     */
    public function groupDetailsWithNextEvent()
    {
        $group = $this->groupDetails();

        return Cache::remember('meetup.group_with_next_event', static::CACHE_MINUTES, function () use ($group) {
            if ($group->get('next_event')) {
                $event_id = (int) $group->get('next_event')['id'];

                $event = $this->getEventDetails($event_id, ['omit' => 'group']);

                $timezone = $group->get('timezone');

                $created_timestamp = $event->get('created') / 1000;
                $event_timestamp   = $event->get('time') / 1000;

                $event->put('talks', $this->first()->talks->toArray());
                $event->put('time_object', Carbon::createFromTimestamp($event_timestamp)->timezone($timezone));
                $event->put('created_object', Carbon::createFromTimestamp($created_timestamp)->timezone($timezone));

                if ($event->get('rsvp_limit')) {
                    $event->put('seats_left', $event->get('rsvp_limit') - $event->get('yes_rsvp_count'));
                }

                $group->put('next_event', $event);
            }

            return $group;
        });
    }

    /**
     * Get the details of the meetup
     *
     * @param  int|null $event_id
     * @param array $options
     * @return \Illuminate\Support\Collection
     */
    public function getEventDetails(int $event_id = null, array $options = [])
    {
        $event_id = $event_id ?? $this->event_id;

        return Cache::remember("meetup.event.{$event_id}", static::CACHE_MINUTES, function () use ($event_id, $options) {
            return Api::getEvent($event_id, $options);
        });
    }

    /**
     * Define the relationship with the Speaker resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function talks() : Eloquent\Relations\HasMany
    {
        return $this->hasMany(Talk::class);
    }
}
