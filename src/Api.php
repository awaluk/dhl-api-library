<?php

namespace awaluk\DhlApi;

use awaluk\DhlApi\Structure\ItemToPrint;
use DateTime;

class Api
{
    private $client;

    /**
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

    /**
     * @param DateTime $dateFrom
     * @param DateTime $dateTo
     * @param int|null $offset
     * @return array
     */
    public function getMyShipments(DateTime $dateFrom, DateTime $dateTo, int $offset = null): array
    {
        $result = $this->client->sendRequest('getMyShipments', [
            'createdFrom' => $dateFrom->format('Y-m-d'),
            'createdTo' => $dateTo->format('Y-m-d'),
            'offset' => $offset
        ]);
        $shipments = [];
        foreach ($result->getMyShipmentsResult->item as $shipment) {
            $shipments[] = (array)$shipment;
        }
        return $shipments;
    }

    /**
     * @param string $labelType
     * @param int $shipmentId
     * @return array
     */
    public function getLabels(string $labelType, int $shipmentId): array
    {
        $result = $this->client->sendRequest('getLabels', [
            'itemsToPrint' => [
                'item' => new ItemToPrint($labelType, $shipmentId)
            ],
        ]);
        return (array)$result->getLabelsResult->item;
    }
}
