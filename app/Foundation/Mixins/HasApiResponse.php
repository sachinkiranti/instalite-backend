<?php

namespace Foundation\Mixins;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait HasApiResponse
{

    public function apiResponse(
        $body,
        int $status = Response::HTTP_OK,
        string $message = 'OK',
        string $messageCode = 'ok',
        array $headers = []
    ): JsonResponse
    {
        return response()->json([
            'body' => $body,
            'status' => [
                'message' => $message,
                'code'    => $messageCode
            ]
        ], $status)->withHeaders($headers);
    }

    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return JsonResponse
     */
    public function responseOk(
        $body,
        int $status = Response::HTTP_OK,
        string $message = 'ok',
        string $messageCode = 'ok',
        array $headers = []
    ): JsonResponse {
        return $this->apiResponse(
            $body,
            $status,
            $message,
            $messageCode,
            $headers
        );
    }

    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return JsonResponse
     */
    public function responseError(
        $body,
        int $status = Response::HTTP_INTERNAL_SERVER_ERROR,
        string $message = 'server error',
        string $messageCode = 'server_error',
        array $headers = []
    ): JsonResponse {
        return $this->apiResponse(
            $body,
            $status,
            $message,
            $messageCode,
            $headers
        );
    }

    /**
     * @param null $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return JsonResponse
     */
    public function responseValidationError(
        string $message = 'form validation failed',
               $body = null,
        string $code = 'form_validation_error',
        array $headers = []
    ): JsonResponse {
        return $this->responseError(
            $body,
            Response::HTTP_UNPROCESSABLE_ENTITY,
            $message,
            $code,
            $headers
        );
    }

}