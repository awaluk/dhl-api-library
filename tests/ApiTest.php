<?php

use awaluk\DhlApi\Api;
use awaluk\DhlApi\Config;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testGetVersion()
    {
        $mockClient = $this->getMockFromWsdl('tests/webapi.wsdl');
        $mockResult = new stdClass();
        $mockResult->getVersionResult = 'testVersion';
        $mockClient->expects($this->any())
            ->method('getVersion')
            ->will($this->returnValue($mockResult));

        $config = new Config('url', 'user1', 'pass1');
        $api = new Api($config, $mockClient);
        $result = $api->getVersion();

        $this->assertEquals('testVersion', $result);
    }

    public function testGetPostalCode()
    {
        $mockClient = $this->getMockFromWsdl('tests/webapi.wsdl');
        $mockResult = new stdClass();
        $postalCodeServicesResult = new stdClass();
        $postalCodeServicesResult->testValue = 'testData';
        $mockResult->getPostalCodeServicesResult = $postalCodeServicesResult;
        $mockClient->expects($this->any())
            ->method('getPostalCodeServices')
            ->will($this->returnValue($mockResult));

        $config = new Config('url', 'user1', 'pass1');
        $api = new Api($config, $mockClient);
        $result = $api->getPostalCodeServices('00000', new DateTime());

        $this->assertEquals(['testValue' => 'testData'], $result);
    }
}
