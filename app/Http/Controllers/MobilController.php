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

    public function index()
    {
        try{
            $mobil = $this->mobilService->getMobils();

            if($mobil){
                return ResponseFormat::successResponse($mobil);
            }else{
                return ResponseFormat::validationResponse('Failed to load.');
            }
        }catch(Exception $err){
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }

    public function show($id)
    {
        try{
            $mobil = $this->mobilService->findMobil($id);

            if($mobil){
                return ResponseFormat::successResponse($mobil);
            }else{
                return ResponseFormat::validationResponse('Failed to load.');
            }
        }catch(Exception $err){
            return ResponseFormat::errorResponse($err->getMessage());
        }
    }
}
