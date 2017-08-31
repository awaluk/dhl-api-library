<?php

use awaluk\DhlApi\Config;
use awaluk\DhlApi\Structure\AuthData;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetUrl()
    {
        $config = new Config('url', 'user1', 'pass1');
        $this->assertEquals('url', $config->getUrl());
    }

    public function testGetConfig()
    {
        $config = new Config('url', 'user1', 'pass1');
        $this->assertInstanceOf(Config::class, $config->get());
    }

    public function testGetAuthData()
    {
        $config = new Config('url', 'user1', 'pass1');
        $authData = $config->getAuthData();
        $this->assertInstanceOf(AuthData::class, $authData);
        $data = $authData->get();
        $this->assertEquals(['username' => 'user1', 'password' => 'pass1'], $data);
    }
}