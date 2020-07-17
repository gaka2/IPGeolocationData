<?php

namespace App\Entity;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\Exception\NoSuchIndexException;

class GeolocationDataBuilder {
    public static function createFromArray(array $data): GeolocationData {

        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()->enableExceptionOnInvalidIndex()->getPropertyAccessor();

        try {
            return new GeolocationData(
                $propertyAccessor->getValue($data, '[query]'),
                $propertyAccessor->getValue($data, '[country]'),
                $propertyAccessor->getValue($data, '[countryCode]'),
                $propertyAccessor->getValue($data, '[city]'),
                $propertyAccessor->getValue($data, '[zip]'),
            );
        } catch (NoSuchIndexException $e) {
            throw new \InvalidArgumentException('Invalid data passed to GeolocationDataBuilder: ' . var_export($data, true));
        }
    }
}