<?php

namespace awaluk\DhlApi;

use awaluk\DhlApi\Structure\AuthData;

class Config
{
    private $url;
    private $username;
    private $password;

    /**
     * Config constructor.
     * @param string $url
     * @param string $username
     * @param string $password
     */
    public function __construct(string $url, string $username, string $password)
    {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        return $this;
    }

    /**
     * @return Config
     */
    public function get(): Config
    {
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return AuthData
     */
    public function getAuthData(): AuthData
    {
        return new AuthData($this->username, $this->password);
    }
}