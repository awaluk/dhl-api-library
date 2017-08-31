<?php

namespace awaluk\DhlApi;

use DateTime;

class Api
{
    private $client;

    /**
     * Api constructor.
     * @param Config $config
     * @param null $client
     */
    public function __construct(Config $config, $client = null)
    {
        $this->client = new Client($config, $client);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        $result = $this->client->sendRequest('getVersion');
        return $result->getVersionResult;
    }

    /**
     * @param string $postalCode
     * @param DateTime $date
     * @return array
     */
    public function getPostalCodeServices(string $postalCode, DateTime $date): array
    {
        $result = $this->client->sendRequest('getPostalCodeServices', [
            'postCode' => $postalCode,
            'pickupDate' => $date->format('Y-m-d')
        ]);
        return (array)$result->getPostalCodeServicesResult;
    }
}
