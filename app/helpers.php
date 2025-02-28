<?php
if (!function_exists('api_success')) {
    /**
     * Generate a success response.
     *
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function api_success(string $message, $data = null, int $statusCode = 200)
    {
        echo response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (!function_exists('api_bad_request')) {
    /**
     * Generate a bad request response.
     *
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function api_bad_request(string $message, $data = null, int $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (!function_exists('api_error')) {
    /**
     * Generate an error response.
     *
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function api_error(string $message, $data = null, int $statusCode = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
