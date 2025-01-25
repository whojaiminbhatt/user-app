<?php

namespace App\Traits;

use Dotenv\Loader\Resolver;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
trait ResponderTrait {

    private function positiveResponse(string $status = 'success', $data, string $message = "Success", int $statusCode = 200):JsonResponse {
        return Response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ], 
        $statusCode);
    }

    private function negativeResponse(string $status = 'error', $data, string $message = "Unprocessable content", int $statusCode = 404): JsonResponse {
        return Response()->json([
            'ststus' => $status,
            'data' => $data,
            'message' => $message,
        ], $statusCode);
    }

    private function internalError(string $status = 'error', $data = null, string $message = "Internal server error.", int $statusCode = 500): JsonResponse {
        return Response()->json([
            'ststus' => $status,
            'data' => $data,
            'message' => $message,
        ], $statusCode);

    }
}
?>
