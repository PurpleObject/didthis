<?php

namespace PurpleObject;

use GuzzleHttp\Client;

class DidThisToday
{
    /** @var API Key for DidThisToday API */
    private $_apiKey;

    /** @var Base url base for DidThisToday */
    private $_dttUrl;

    public function __construct($apiKey) {
        $this->_apiKey = $apiKey;
        $this->_dttUri = 'http://didthistoday.com';
        $this->client = new Client(
            [
                'base_uri' => $this->_dttUri,
                'headers'  => ['DTT-APIKEY' => $this->_apiKey],
                'timeout'  => 2.0
            ]
        );
    }

    public function didThis($did)
    {

    }


    /**
     * Return all tags for user associated with API Key.
     *
     * @return array
     */
    public function getTags()
    {
        $response = $this->client->request('GET', '/api/tags');

        return json_decode($response->getBody(), true);
    }

    /**
     * Return all Teams for user associated with API Key.
     *
     * @return mixed
     */
    public function getTeams()
    {
        $response = $this->client->request('GET', '/api/teams');

        return json_decode($response->getBody(), true);
    }

}