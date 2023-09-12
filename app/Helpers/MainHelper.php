<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('final_response')) {

    /**
     * @param string $status
     * @param string $message
     * @param $error
     * @param int $code
     * @param array $data
     * @return JsonResponse
     */
    function final_response(string $status = "success", string $message = '', $error = null, int $code = 200, $data = []): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'error' => $error,
            'data' => $data,
        ], $code);

    }
}

