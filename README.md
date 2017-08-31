# DHL API Library

## Installation
- `composer install`

## Example usage
```php
<?php

require_once 'vendor/autoload.php';

$config = new \awaluk\DhlApi\Config(
    'url to API',
    'username',
    'password'
);
$api = new \awaluk\DhlApi\Api($config);
echo $api->getVersion();
```