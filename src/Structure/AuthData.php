<?php

namespace awaluk\DhlApi\Structure;

class AuthData implements StructureInterface
{
    private $username;
    private $password;

    /**
     * AuthData constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return get_object_vars($this);
    }
}