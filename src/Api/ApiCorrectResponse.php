<?php

namespace App\Api;

use Symfony\Component\HttpFoundation\Response;

class ApiCorrectResponse extends ApiResponse {
    public function __construct(array $data) {
        parent::__construct('success', $data, Response::HTTP_OK);
    }
}
