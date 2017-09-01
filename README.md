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
```

- Get API version
```php
echo $api->getVersion();
```

- Check delivery on Saturday for date and postal code
```php
$saturdayDelivery = $api->getPostalCodeServices('00001', new DateTime('2017-09-02'))['deliverySaturday'];
```

- Get shipments number for month
```php
$shipments = $api->getMyShipments(new DateTime('2017-09-01'), new DateTime('2017-09-30'));
foreach ($shipments as $shipment) {
    echo $shipment['shipmentId'];
}
```

- Get waybill in PDF for shipment
```php
$waybill = $api->getLabels('LP', 12345)['labelData'];
```

- Errors handling with exceptions
```php
try {
    $saturdayDelivery = $api->getPostalCodeServices('00001', new DateTime('2017-09-02'))['deliverySaturday'];
} catch (\awaluk\DhlApi\Exception\ApiErrorException $e) {
    echo $e->getMessage();
}
```