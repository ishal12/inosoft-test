<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ResponseFormat;
use App\Repositories\PenjualanRepository;
use App\Repositories\MobilRepository;
use App\Repositories\MotorRepository;
use Illuminate\Support\Facades\Validator;

class PenjualanService
{
    protected $penjualanRepository;
    protected $mobilRepository;
    protected $motorRepository;

    public function __construct(
        PenjualanRepository $penjualanRepository,
        MobilRepository $mobilRepository,
        MotorRepository $motorRepository
    ) {
        $this->penjualanRepository = $penjualanRepository;
        $this->mobilRepository = $mobilRepository;
        $this->motorRepository = $motorRepository;
    }

    public function getAll()
    {
        return $this->penjualanRepository->getAll();
    }

    public function findPenjualan($id)
    {
        return $this->penjualanRepository->findById($id);
    }

    public function findPenjualanByKendaraan($tipe_kendaraan)
    {
        if ($tipe_kendaraan == "mobil" || $tipe_kendaraan == "motor") {
            return $this->penjualanRepository->findByType($tipe_kendaraan);
        }
    }

    public function storePenjualan($data)
    {
        $validator = Validator::make($data->all(), [
            "kendaraan_id" => "required",
            "tipe_kendaraan" => "required",
            "harga" => "required",
        ]);

        if ($validator->fails()) {
            return ResponseFormat::validationResponse($data, $validator);
        }

        if ($data["tipe_kendaraan"] == "mobil") {
            $this->mobilRepository->delete($data["kendaraan_id"]);
        }

        if ($data["tipe_kendaraan"] == "motor") {
            $this->motorRepository->delete($data["kendaraan_id"]);
        }

        return $this->penjualanRepository->store(
            $data["kendaraan_id"],
            $data["tipe_kendaraan"],
            $data["harga"]
        );
    }
}
