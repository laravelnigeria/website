<?php

namespace App;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use App\Exceptions\ApiCommunicationException;

class MeetupApi {

    /**
     * API Key from meetup.com
     *
     * @var false|string
     */
    protected $apikey = false;

    /**
     * The base url for the meetup api.
     *
     * @var string
     */
    protected $baseUrl = 'https://api.meetup.com/';

    /**
     * The URL name.
     *
     * @var boolean
     */
    protected $urlName = false;

    /**
     * Guzzle instance for http requests
     *
     * @var Client
     */
    protected $client;

    /**
     * Create an instance of the API class.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->apikey  = $options['key'] ?? false;
        $this->urlName = $options['urlName'] ?? false;
        $this->client  = new Client(['base_uri' => $this->baseUrl]);
    }

    /**
     * Get the group details.
     *
     * @param  array $options
     * @return Collection
     */
    public function getGroupDetails(array $options = []) : Collection
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
     * @return Collection
     */
    public function getEvent(int $id, array $options = []) : Collection
    {
        $params = array_only($options, ['only', 'omit', 'fields']);

        $response = $this->get($this->prepareUrl("/:urlname/events/{$id}", $params));

        return $this->toCollection($response);
    }

    /**
     * Prepare the URL.
     *
     * @param  string $url
     * @param  array $params
     * @return string
     */
    protected function prepareUrl(string $url, array $params = []) : string
    {
        $url = str_replace(':urlname', $this->urlName, $url);

        if ($this->apikey !== false) {
            $url .= "?key={$this->apikey}&signed=true";
        } else {
            $url .= '?_=1';
        }

        return $url.'&'.http_build_query($params);
    }

    /**
     * Send a get request to the client.
     *
     * @param string $url
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws ApiCommunicationException
     */
    protected function get(string $url, array $params = [])
    {
        try {
            return $this->client->get($url, $params);
        } catch (Exception $e) {
            throw new ApiCommunicationException($e);
        }
    }

    /**
     * Convert the response to a laravel collection.
     *
     * @param $response
     * @return Collection
     */
    protected function toCollection($response) : Collection
    {
        $data = json_decode($response->getBody(), true);

        return new Collection($data);
    }
}