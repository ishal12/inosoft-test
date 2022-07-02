<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Helpers\ResponseFormat;
use App\Services\MotorService;

class MotorController extends Controller
{
    protected $motorService;

    public function __construct(MotorService $motorService)
    {
        $this->motorService = $motorService;
    }

    public function index()
    {
        try {
            $motor = $this->motorService->getMotors();

            if ($motor) {
                return ResponseFormat::successResponse($motor);
            } else {
                return ResponseFormat::validationResponse("Failed to load.");
            }
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $motor = $this->motorService->findMotor($id);

            if ($motor) {
                return ResponseFormat::successResponse($motor);
            } else {
                return ResponseFormat::validationResponse("Failed to load.");
            }
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
