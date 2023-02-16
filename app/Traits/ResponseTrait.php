<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function responseData($data, $message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => true,
                'message' => $message,
                'data' => $data
            ], 200);
        }
        return new JsonResponse([
            'result' => true,
            'data' => $data
        ], 200);
    }

    public function responseError($message = null, $status = 500)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => true,
                'error' => $message,
            ], $status);
        }
        return new JsonResponse([
            'result' => true,
        ], $status);
    }
    public function responseValidation($validation, $data = null)
    {
        if ($data != null) {
            return new JsonResponse([
                'result' => false,
                'data' => $data,
                'error' => $validation
            ], 422);
        }
        return new JsonResponse([
            'result' => false,
            'error' => $validation
        ], 422);
    }

    public function responseDataNotFound($data_name = null)
    {
        if ($data_name != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $data_name . ' not found'
            ], 404);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'data not found'
        ], 404);
    }

    public function responseForbidden($message = null)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 403);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'no access permission'
        ], 403);
    }

    public function responseTryCatch($message = null, $status = 500)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], $status);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'an error occurred'
        ], $status);
    }

    public function responseUnauthorized($message = null, $status = 500)
    {
        if ($message != null) {
            return new JsonResponse([
                'result' => false,
                'error' => $message
            ], 401);
        }
        return new JsonResponse([
            'result' => false,
            'error' => 'not authorized'
        ], 401);
    }

    public function responseDataCount($data)
    {
        return new JsonResponse([
            'result'    => true,
            'count'      => count($data),
            'data'      => $data
        ], 200);
    }
}