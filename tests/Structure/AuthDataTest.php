<?php

use awaluk\DhlApi\Structure\AuthData;
use PHPUnit\Framework\TestCase;

class AuthDataTest extends TestCase
{
    public function testGetObject()
    {
        $authData = new AuthData('user1', 'pass1');
        $this->assertEquals(['username' => 'user1', 'password' => 'pass1'], $authData->get());
    }
}
