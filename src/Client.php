<?php

namespace awaluk\DhlApi;

use awaluk\DhlApi\Exception\ApiErrorException;
use SoapClient;
use SoapFault;
use stdClass;

class Client
{
    private $client;
    private $config;

    /**
     * Client constructor.
     * @param Config $config
     * @param null $client
     * @throws ApiErrorException
     */
    public function __construct(Config $config, $client = null)
    {
        $this->config = $config;
        if (!empty($client)) {
            $this->client = $client;
        } else {
            try {
                $this->client = new SoapClient($this->config->getUrl());
            } catch (SoapFault $e) {
                throw new ApiErrorException($e->getMessage());
            }
        }
    }

    /**
     * @param string $method
     * @param array $data
     * @return stdClass
     * @throws ApiErrorException
     */
    public function sendRequest(string $method, array $data = []): stdClass
    {
        $data['authData'] = $this->config->getAuthData();
        try {
            return $this->client->$method($data);
        } catch (SoapFault $e) {
            throw new ApiErrorException($e->getMessage());
        }
    }
}
