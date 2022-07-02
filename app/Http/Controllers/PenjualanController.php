<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Helpers\ResponseFormat;
use App\Services\PenjualanService;

class PenjualanController extends Controller
{
    protected $penjualanService;

    public function __construct(PenjualanService $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $penjualan = $this->penjualanService->getAll();

            if (!$penjualan) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($penjualan);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  request kendaraan_id
     * @param  request tipe_kendaraan
     * @param  request harga
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $penjualan = $this->penjualanService->storePenjualan($request);

            return ResponseFormat::successResponse($penjualan);
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
            $penjualan = $this->penjualanService->findPenjualan($id);

            if (!$penjualan) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($penjualan);
        } catch (Exception $err) {
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $tipe_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function showKendaraans($tipe_kendaraan)
    {
        try {
            $penjualan = $this->penjualanService->findPenjualanByKendaraan(
                $tipe_kendaraan
            );

            if (!$penjualan) {
                return ResponseFormat::validationResponse("Failed to load.");
            }

            return ResponseFormat::successResponse($penjualan);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
