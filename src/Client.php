<?php

namespace awaluk\DhlApi;

use SoapClient;
use stdClass;

class Client
{
    private $client;
    private $config;

    /**
     * Client constructor.
     * @param Config $config
     * @param null $client
     */
    public function __construct(Config $config, $client = null)
    {
        $this->config = $config;
        if (!empty($client)) {
            $this->client = $client;
        } else {
            $this->client = new SoapClient($this->config->getUrl());
        }
    }

    /**
     * @param string $method
     * @param array $data
     * @return stdClass
     */
    public function sendRequest(string $method, array $data = []): stdClass
    {
        $data['authData'] = $this->config->getAuthData();
        return $this->client->$method($data);
    }
}
