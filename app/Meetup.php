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
    const CACHE_MINUTES = 15;

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
                $id = (int) $group->get('next_event')['id'];

                $group->put('next_event', $this->getEventDetails($id, ['omit' => 'group']));
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
            $event = Api::getEvent($event_id, $options);

            $created_timestamp = $event->get('created') / 1000;
            $event_timestamp   = $event->get('time') / 1000;

            $events = $this->whereEventId($event_id)->with(['talks' => function ($talks) {
                            $talks->accepted()->ordered();
                        }])->first();

            $talks = $events ? $events->talks->toArray() : [];

            $event->put('talks', $talks);

            $event->put('time_object', Carbon::createFromTimestamp($event_timestamp));
            $event->put('created_object', Carbon::createFromTimestamp($created_timestamp));

            if ($event->get('rsvp_limit')) {
                $event->put('seats_left', $event->get('rsvp_limit') - $event->get('yes_rsvp_count'));
            }

            return $event;
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
