<?php

declare(strict_types=1);

namespace App\Repositories;

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

    public function getTrashed()
    {
        $motor = Motor::onlyTrashed()->get();

        return $motor;
    }

    public function findById($id)
    {
        $motor = Motor::find($id);

        return $motor;
    }

    public function update($data, $id)
    {
        $motor = Motor::find($id);
        $motor->warna = $data["warna"];
        $motor->harga = $data["harga"];

        return $motor->save();
    }

    public function delete($id)
    {
        $motor = Motor::find($id);

        return $motor->delete();
    }
}
