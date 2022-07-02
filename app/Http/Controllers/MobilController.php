<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Helpers\ResponseFormat;
use App\Services\MobilService;

class MobilController extends Controller
{
    protected $mobilService;

    public function __construct(MobilService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $mobil = $this->mobilService->getMobils();

            if (!$mobil) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($mobil);
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
            $mobil = $this->mobilService->getMobilsTrashed();

            if (!$mobil) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($mobil);
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
            $mobil = $this->mobilService->findMobil($id);

            if (!$mobil) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($mobil);
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
            $mobil = $this->mobilService->updateMobil($request, $id);

            return ResponseFormat::successResponse($mobil);
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
            $mobil = $this->mobilService->deleteMobil($id);

            return ResponseFormat::successResponse($mobil);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
