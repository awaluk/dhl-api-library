<?php

namespace awaluk\DhlApi\Exception;

use Exception;

class ApiErrorException extends Exception
{
    public function __construct($message)
    {
        $this->message = 'Error while loading data from DHL API: '.$message;
    }
}
