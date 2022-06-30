<?php

namespace App\Helpers;

class Response
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => true,
            'message' => null,
        ],
        'data' => null,
    ];

    public static function successResponse($message = 'Success load data.', $data = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response['meta']['code']);
    }

    public static function errorResponse($message = 'Failed load data.')
    {
        self::$response['meta']['code'] = 500;
        self::$response['meta']['status'] = false;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = null;

        return response()->json(self::$response['meta']['code']);
    }

    public static function validationResponse($message = 'Validation error.', $data = null)
    {
        self::$response['meta']['code'] = 400;
        self::$response['meta']['status'] = false;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response['meta']['code']);
    }

    public static function notFoundResponse($message = null)
    {
        self::$response['meta']['code'] = 404;
        self::$response['meta']['status'] = false;
        self::$response['meta']['message'] = $message;

        return response()->json(self::$response['meta']['code']);
    }

    public static function unauthorizedResponse($message = null)
    {
        self::$response['meta']['code'] = 401;
        self::$response['meta']['status'] = false;
        self::$response['meta']['message'] = $message;

        return response()->json(self::$response['meta']['code']);
    }
}