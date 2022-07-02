<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ResponseFormat;
use App\Repositories\MotorRepository;
use Illuminate\Support\Facades\Validator;

class MotorService
{
    protected $motorRepository;

    public function __construct(MotorRepository $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }

    public function getMotors()
    {
        return $this->motorRepository->getAll();
    }

    public function getMotorsTrashed()
    {
        return $this->motorRepository->getTrashed();
    }

    public function findMotor($id)
    {
        return $this->motorRepository->findById($id);
    }

    public function updateMotor($data, $id)
    {
        $validator = Validator::make($data->all(), [
            "warna" => "required",
            "harga" => "required",
        ]);

        if ($validator->fails()) {
            return ResponseFormat::validationResponse($data, $validator);
        }

        return $this->motorRepository->update($data, $id);
    }

    public function deleteMotor($id)
    {
        return $this->motorRepository->delete($id);
    }
}
