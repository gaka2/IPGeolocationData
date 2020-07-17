<?php

namespace App\Api;

use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ApiResponse extends JsonResponse {

    public function __construct(string $status, array $data, int $code) {
        $responseContent = [
            'status' => $status,
            'code' => $code,
            'data' => $data
        ];
        parent::__construct($responseContent, $code);
    }
}
