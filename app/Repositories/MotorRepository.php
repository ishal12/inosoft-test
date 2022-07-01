<?php

declare(strict_types=1);

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Motor;

class MotorRepository
{
    protected $motor;

    public function __construct(Motor $motor)
    {
        $this->motor = $motor;
    }

    public function getAll()
    {
        $motor = Motor::all();

        return $motor;
    }

    public function findById($id)
    {
        $motor = Motor::find($id);

        return $motor;
    }
}
