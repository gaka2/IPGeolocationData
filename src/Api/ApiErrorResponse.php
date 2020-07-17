<?php

namespace App\Api;

use Symfony\Component\HttpFoundation\Response;

class ApiErrorResponse extends ApiResponse {
    public function __construct() {
        parent::__construct('failure', [], Response::HTTP_BAD_REQUEST);
    }
}
