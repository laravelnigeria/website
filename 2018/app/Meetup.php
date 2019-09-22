<?php

namespace App;

use Carbon\Carbon;
use Facades\App\Services\MeetupDotCom;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\InvalidMeetupEventException;

class Meetup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'link',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'talks',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the group details.
     *
     * @return \Illuminate\Support\Collection
     */
    public function groupDetails(): \Illuminate\Support\Collection
    {
        return MeetupDotCom::getGroupDetails();
    }

    /**
     * Get the group details with full details on the next event.
     *
     * @return \Illuminate\Support\Collection
     */
    public function groupDetailsWithNextEvent(): \Illuminate\Support\Collection
    {
        $group = $this->groupDetails();

        if ($group->get('next_event')) {
            $id = (int) $group->get('next_event')['id'];

            $group->put('next_event', $this->getEventDetails($id, ['omit' => 'group']));
        }

        return $group;
    }

    /**
     * Get the details of the meetup
     *
     * @param  int|null $id   The events ID
     * @param array $options  API fetching options
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\InvalidMeetupEventException
     */
    public function getEventDetails(int $id = null, array $options = []): \Illuminate\Support\Collection
    {
        if ($id === null) {
            throw_unless($this->exists, InvalidMeetupEventException::class, 'Cannot find event.');

            $id = (int) $this->event_id;
        }

        $eventModel = $this->loadEventWithTalks($id)->first();

        $event = MeetupDotCom::getEvent($id, $options);
        $event->put('talks', $eventModel ? $eventModel->talks->toArray() : []);
        $event->put('starts_at', Carbon::createFromTimestamp($event->get('time') / 1000));
        $event->put('created_at', Carbon::createFromTimestamp($event->get('created') / 1000));

        if ($event->get('rsvp_limit')) {
            $seats_left = $event->get('rsvp_limit') - $event->get('yes_rsvp_count');

            $event->put('seats_left', $seats_left);
        }

        return $event;
    }

    /**
     * Load event with the talks for that event.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLoadEventWithTalks($query, int $id): \Illuminate\Database\Eloquent\Builder
    {
        return $query->with(['talks' => function ($talks) {
            $talks->with(['user' => function ($user) {
                $user->with('profile');
            }])->accepted()->ordered();
        }])->where('event_id', $id);
    }

    /**
     * Define the relationship with the Speaker resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function talks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Talk::class);
    }
}
