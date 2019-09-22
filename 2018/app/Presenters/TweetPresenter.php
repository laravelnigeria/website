<?php

namespace App\Presenters;

use JsonSerializable;
use Facades\App\Services\Twitter;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use Thujohn\Twitter\Facades\Twitter as TwitterApi;

class TweetPresenter implements Arrayable, JsonSerializable
{
    /**
     * Tweet.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $tweet;

    /**
     * Compose a new tweet into a tweet presenter.
     *
     * @param \stdClass $tweet
     */
    public function __construct(\stdClass $tweet)
    {
        $this->tweet = new Collection([
            'original' => $tweet,
            'user_name' => $tweet->user->name,
            'user_screen_name' => $tweet->user->screen_name,
            'text' => $tweet ? TwitterApi::linkify($tweet->text) : '',
            'user_profile_link' => $tweet ? TwitterApi::linkUser($tweet->user) : '',
            'user_avatar' => $tweet ? Twitter::avatar($tweet->user, 'bigger') : '',
        ]);
    }

    /**
     * Get a key from the tweet collection.
     *
     * @param  string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->tweet->get($key);
    }

    /**
     * Returns an array representation of the Tweet.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->tweet->toArray();
    }

    /**
     * Returns a Collection representation of the Tweet.
     *
     * @return \Illuminate\Support\Collection
     */
    public function toCollection(): \Illuminate\Support\Collection
    {
        return $this->tweet;
    }

    /**
     * Json serialisable data.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
