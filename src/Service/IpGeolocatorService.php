<?php

namespace App\Service;

use Psr\Http\Client\ClientInterface;
use App\Entity\GeolocationData;
use Psr\Log\LoggerInterface;
use App\Entity\GeolocationDataBuilder;

class IpGeolocatorService implements IpGeolocatorServiceInterface {
    private $client;
    private $logger;

    private const API_URL = 'http://ip-api.com/json/';

    public function __construct(ClientInterface $client, LoggerInterface $logger) {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getGeolocation(string $ipAddress): ?GeolocationData {

        $geolocationData = null;

        try {
            $data = $this->getDataFromApi($ipAddress);
            $geolocationData = $this->mapDataFromApi($data);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return $geolocationData;
    }

    private function getDataFromApi(string $ipAddress) {
        $request = $this->client->createRequest('GET', self::API_URL . $ipAddress);
        $response = $this->client->sendRequest($request);

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    private function mapDataFromApi(array $data): GeolocationData {
        if ($data['status'] !== 'success') {
            throw new \DomainException('Invalid response from third-party API');
        }

        return GeolocationDataBuilder::createFromArray($data);
    }
}
