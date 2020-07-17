<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\IpGeolocatorServiceInterface;
use App\Api\ApiCorrectResponse;
use App\Api\ApiErrorResponse;

class IpGeolocationApiController extends AbstractController {
    /**
     * @Route("/api/geolocation/{ipAddress}", methods={"GET"})
     */
    public function getGeolocationData(string $ipAddress, IpGeolocatorServiceInterface $ipGeolocatorServiceInterface) {    
        $geolocationData = $ipGeolocatorServiceInterface->getGeolocation($ipAddress);

        if ($geolocationData === null) {
            return new ApiErrorResponse();
        }

        return new ApiCorrectResponse($geolocationData->jsonSerialize());
    }
}
