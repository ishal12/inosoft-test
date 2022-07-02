<?php

namespace App\Helpers;

class ResponseFormat
{
    protected static $response = [
        "meta" => [
            "code" => 200,
            "status" => true,
            "message" => null,
        ],
        "data" => null,
    ];

    public static function successResponse(
        $data = null,
        $message = "Success load data."
    ) {
        self::$response["meta"]["message"] = $message;
        self::$response["data"] = $data;

        return response()->json(
            self::$response,
            self::$response["meta"]["code"]
        );
    }

    public static function errorResponse($message = "Failed load data.")
    {
        self::$response["meta"]["code"] = 500;
        self::$response["meta"]["status"] = false;
        self::$response["meta"]["message"] = $message;
        self::$response["data"] = null;

        return response()->json(
            self::$response,
            self::$response["meta"]["code"]
        );
    }

    public static function validationResponse(
        $data = null,
        $message = "Validation error."
    ) {
        self::$response["meta"]["code"] = 400;
        self::$response["meta"]["status"] = false;
        self::$response["meta"]["message"] = $message;
        self::$response["data"] = $data;

        return response()->json(
            self::$response,
            self::$response["meta"]["code"]
        );
    }

    public static function notFoundResponse($message = null)
    {
        self::$response["meta"]["code"] = 404;
        self::$response["meta"]["status"] = false;
        self::$response["meta"]["message"] = $message;

        return response()->json(
            self::$response,
            self::$response["meta"]["code"]
        );
    }

    public static function unauthorizedResponse($message = null)
    {
        self::$response["meta"]["code"] = 401;
        self::$response["meta"]["status"] = false;
        self::$response["meta"]["message"] = $message;

        return response()->json(
            self::$response,
            self::$response["meta"]["code"]
        );
    }
}
