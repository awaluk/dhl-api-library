<?php

namespace awaluk\DhlApi\Structure;

class ItemToPrint implements StructureInterface
{
    private $labelType;
    private $shipmentId;

    /**
     * @param string $labelType
     * @param int $shipmentId
     */
    public function __construct(string $labelType, int $shipmentId)
    {
        $this->labelType = $labelType;
        $this->shipmentId = $shipmentId;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return get_object_vars($this);
    }
}
