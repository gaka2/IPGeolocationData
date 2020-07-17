<?php

namespace App\Service;

use App\Entity\GeolocationData;

interface IpGeolocatorServiceInterface {
    public function getGeolocation(string $ipAddress): ?GeolocationData;
}
