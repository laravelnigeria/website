<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use App\Exceptions\ApiCommunicationException;

class MeetupDotCom
{
    /**
     * API Key from meetup.com
     *
     * @var string|false
     */
    protected $apiKey = false;

    /**
     * The base url for the meetup api.
     *
     * @var string
     */
    protected $baseUrl = 'https://api.meetup.com/';

    /**
     * The URL name.
     *
     * @var string|false
     */
    protected $urlName = false;

    /**
     * Guzzle instance for HTTP requests.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create an instance of the API class.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->apiKey = $options['key'] ?? false;

        $this->urlName = $options['urlName'] ?? false;

        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    /**
     * Get the group details.
     *
     * @param  array $options
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\ApiCommunicationException
     */
    public function getGroupDetails(array $options = []): \Illuminate\Support\Collection
    {
        $params = array_only($options, ['only', 'omit', 'fields']);

        $response = $this->get($this->prepareUrl('/:urlname', $params));

        return $this->toCollection($response);
    }

    /**
     * Get an event.
     *
     * @param  integer $id
     * @param  array   $options
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\ApiCommunicationException
     */
    public function getEvent(int $id, array $options = []): \Illuminate\Support\Collection
    {
        $params = array_only($options, ['only', 'omit', 'fields']);

        $response = $this->get($this->prepareUrl("/:urlname/events/{$id}", $params));

        return $this->toCollection($response);
    }

    /**
     * Prepare the URL by appending the API key to it.
     *
     * @param  string $url
     * @param  array $params
     * @return string
     */
    protected function prepareUrl(string $url, array $params = []): string
    {
        $url = str_replace(':urlname', $this->urlName, $url);

        $url .= $this->apiKey ? "?key={$this->apiKey}&signed=true" : '?_=1';

        return $url . '&' . http_build_query($params);
    }

    /**
     * Send a get request to the client.
     *
     * @param string $url
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \App\Exceptions\ApiCommunicationException
     */
    protected function get(string $url, array $params = []): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->get($url, $params);
        } catch (Exception $e) {
            throw new ApiCommunicationException($e);
        }
    }

    /**
     * Convert the response to a Laravel collection.
     *
     * @param $response
     * @return \Illuminate\Support\Collection
     */
    protected function toCollection($response): \Illuminate\Support\Collection
    {
        $data = (array) json_decode($response->getBody(), true);

        return new Collection($data);
    }
}
