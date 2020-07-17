<?php

namespace App\Entity;

final class GeolocationData implements \JsonSerializable {
    private $ipAddress;
    private $country;
    private $countryIsoCode;
    private $city;
    private $postalCode;

    public function __construct(string $ipAddress, string $country, string $countryIsoCode, string $city, string $postalCode) {
        $this->ipAddress = $ipAddress;
        $this->country = $country;
        $this->countryIsoCode = $countryIsoCode;
        $this->city = $city;
        $this->postalCode = $postalCode;
    }

    public function getIpAddress(): string {
        return $this->ipAddress;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function getCountryIsoCode(): string {
        return $this->countryIsoCode;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getPostalCode(): string {
        return $this->postalCode;
    }

    public function jsonSerialize() {
        return [
            'country' => $this->country,
            'countryIsoCode' => $this->countryIsoCode,
            'city' => $this->city,
            'postalCode' => $this->postalCode
        ];
    }
}
