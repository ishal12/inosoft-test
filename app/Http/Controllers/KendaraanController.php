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

    public function index()
    {
        try{
            $kendaraan = $this->kendaraanService->getKendaraans();

            if($kendaraan){
                return ResponseFormat::successResponse($kendaraan);
            }else{
                return ResponseFormat::validationResponse('Failed to load.');
            }
        }catch(Exception $err){
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    public function countKendaraans()
    {
        try{
            $kendaraan = $this->kendaraanService->countKendaraans();

            if($kendaraan){
                return ResponseFormat::successResponse($kendaraan);
            }else{
                return ResponseFormat::validationResponse('Failed to load.');
            }
        }catch(Exception $err){
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
