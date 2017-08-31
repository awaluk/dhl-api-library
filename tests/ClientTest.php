<?php

use awaluk\DhlApi\Client;
use awaluk\DhlApi\Config;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testSendRequest()
    {
        $mockClient = $this->getMockFromWsdl('tests/webapi.wsdl');
        $mockResult = new stdClass;
        $mockResult->getVersionResult = 'testVersion';
        $mockClient->expects($this->any())
            ->method('getVersion')
            ->will($this->returnValue($mockResult));

        $config = new Config('url', 'user1', 'pass1');
        $client = new Client($config, $mockClient);
        $result = $client->sendRequest('getVersion');

        $this->assertInstanceOf(stdClass::class, $result);
        $this->assertEquals('testVersion', $result->getVersionResult);
    }
}
