<?php

namespace App;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Thujohn\Twitter\Facades\Twitter as TwitterApi;
use App\Exceptions\TwitterApiCommunicationException;

class Twitter extends TwitterApi {

    /**
     * Search through twitters API to get the latest tweets about a topic.
     *
     * @param array $parameters
     * @return Collection
     * @throws TwitterApiCommunicationException
     */
    public static function search(array $parameters = [])
    {
        if (empty($parameters)) {
            $parameters = config('services.twitter.search');
        }

        try {
            $key = "tweets.".md5($parameters['q']);

            $minutes = (int) env('TWITTER_SEARCH_CACHE_TIME', 10);

            return Cache::remember($key, $minutes, function () use ($parameters) {
                $results = static::getSearch($parameters);

                return new Collection([
                    'statuses' => new Collection($results->statuses),
                    'search_metadata' => new Collection($results->search_metadata),
                ]);
            });
        } catch (Exception $e) {
            throw new TwitterApiCommunicationException($e);
        }
    }

    /**
     * Returns the profile image for the user.
     *
     * @param  $user
     * @param  string $type Valid types include "normal", "bigger" and "original"
     * @return string
     * @throws Exception
     */
    public static function profileImage($user, string $type = 'normal') : string
    {
        if ( ! in_array($type, ['normal', 'bigger', 'original'])) {
            throw new Exception("Unknown profile image type specified: {$type}.");
        }

        $replacement = $type == 'original' ? '.' : "_{$type}.";

        return str_replace('_normal.', $replacement, $user->profile_image_url_https);
    }
}