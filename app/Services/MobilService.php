<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ResponseFormat;
use App\Repositories\MobilRepository;
use Illuminate\Support\Facades\Validator;

class MobilService
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }

    public function getMobils()
    {
        return $this->mobilRepository->getAll();
    }

    public function getMobilsTrashed()
    {
        return $this->mobilRepository->getTrashed();
    }

    public function findMobil($id)
    {
        return $this->mobilRepository->findById($id);
    }

    public function updateMobil($data, $id)
    {
        $validator = Validator::make($data->all(), [
            "warna" => "required",
            "harga" => "required",
        ]);

        if ($validator->fails()) {
            return ResponseFormat::validationResponse($data, $validator);
        }

        return $this->mobilRepository->update($data, $id);
    }

    public function deleteMobil($id)
    {
        return $this->mobilRepository->delete($id);
    }
}
