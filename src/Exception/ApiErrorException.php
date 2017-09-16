<?php

namespace awaluk\DhlApi\Exception;

use Exception;

class ApiErrorException extends Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = 'Error while loading data from DHL API: '.$message;
    }
}
