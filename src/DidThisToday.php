<?php

namespace PurpleObject;

use GuzzleHttp\Client;

class DidThisToday
{
    /** @var API Key for DidThisToday API */
    private $_apiKey;

    /** @var API url base for DidThisToday API */
    private $_apiUrl;

    public function __construct(
        $apiKey,
        $apiUrl
    ) {
        $this->_apiKey = $apiKey;
        $this->_apiUrl = $apiUrl;
        $this->client = new Client(
            [
                'base_uri' => $this->_apiUrl,
                'headers'  => ['DTT-APIKEY' => $this->_apiKey],
                'timeout'  => 2.0
            ]
        );
    }

    public function didThis()
    {

    }

    /**
     * Return all tags for user associated with API Key.
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getTags()
    {
        $response = $this->client->request('GET', '/tags');

        return $response->getBody();
    }
}