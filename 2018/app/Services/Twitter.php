<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Collection;
use App\Presenters\TweetPresenter;
use Thujohn\Twitter\Facades\Twitter as TwitterApi;
use App\Exceptions\TwitterApiCommunicationException as ApiException;

class Twitter extends TwitterApi
{
    /**
     * Search through twitters API to get the latest tweets about a topic.
     *
     * @param array $params
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\TwitterApiCommunicationException
     */
    public function search(array $params = []): \Illuminate\Support\Collection
    {
        $params = empty($params) ? config('services.twitter.search', []) : $params;

        try {
            $results = static::getSearch($params);

            return new Collection([
                'tweets' => new Collection($results->statuses),
                'search_metadata' => new Collection($results->search_metadata),
            ]);
        } catch (Exception $e) {
            throw new ApiException($e);
        }
    }

    /**
     * Search through twitters API to get the latest tweets about a topic.
     *
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\TwitterApiCommunicationException
     */
    public function searchWithFallbackQuery(array $params = []): \Illuminate\Support\Collection
    {
        $params = empty($params) ? config('services.twitter.search', []) : [];

        $fallbackQuery = config('services.twitter.search.fallback_query');

        $search = $this->search($params);

        if ($search->get('tweets')->isNotEmpty() or $fallbackQuery === '') {
            return $search;
        }

        $params['q'] = $fallbackQuery;

        return $this->search($params);
    }

    /**
     * Returns the profile image for the user.
     *
     * @param  $user
     * @param  string $type Valid types include "normal", "bigger" and "original"
     * @return string
     * @throws \App\Exceptions\TwitterApiCommunicationException
     */
    public function avatar($user, string $type = 'normal'): string
    {
        $validTypes = ['normal', 'bigger', 'original'];

        throw_unless(in_array($type, $validTypes), ApiException::class, 'Unknown image type.');

        $type = $type === 'original' ? '.' : "_{$type}.";

        return str_replace('_normal.', $type, $user->profile_image_url_https);
    }

    /**
     * Get a presentable version of the tweet.
     *
     * @param  \stdClass $tweet
     * @return \App\Presenters\TweetPresenter
     */
    public function presentable(\stdClass $tweet): \App\Presenters\TweetPresenter
    {
        return new TweetPresenter($tweet);
    }
}
