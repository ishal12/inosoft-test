<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Helpers\ResponseFormat;
use App\Services\KendaraanService;

class KendaraanController extends Controller
{
    protected $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kendaraan = $this->kendaraanService->getKendaraans();

            if (!$kendaraan) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($kendaraan);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Display a count of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countKendaraans()
    {
        try {
            $kendaraan = $this->kendaraanService->countKendaraans();

            if (!$kendaraan) {
                return ResponseFormat::validationResponse("Failed to load.");
            }
            return ResponseFormat::successResponse($kendaraan);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
