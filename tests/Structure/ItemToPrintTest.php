<?php

use awaluk\DhlApi\Structure\ItemToPrint;
use PHPUnit\Framework\TestCase;

class ItemToPrintTest extends TestCase
{
    public function testGetObject()
    {
        $itemToPrint = new ItemToPrint('label', '12345');
        $this->assertEquals(['labelType' => 'label', 'shipmentId' => '12345'], $itemToPrint->get());
    }
}
