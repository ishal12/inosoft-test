<?php

declare(strict_types=1);

namespace App\Services;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Repositories\MotorRepository;

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

    public function findMotor($id)
    {
        return $this->motorRepository->findById($id);
    }
}
