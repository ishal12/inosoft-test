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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $motor = $this->motorService->getMotors();

            if (!$motor) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($motor);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Display a deleted listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        try {
            $motor = $this->motorService->getMotorsTrashed();

            if (!$motor) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($motor);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $motor = $this->motorService->findMotor($id);

            if (!$motor) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($motor);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $motor = $this->motorService->updateMotor($request, $id);

            return ResponseFormat::successResponse($motor);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $motor = $this->motorService->deleteMotor($id);

            return ResponseFormat::successResponse($motor);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
