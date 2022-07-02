<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Mobil;

class MobilRepository
{
    protected $mobil;

    public function __construct(Mobil $mobil)
    {
        $this->mobil = $mobil;
    }

    public function getAll()
    {
        $mobil = Mobil::all();

        return $mobil;
    }

    public function getTrashed()
    {
        $mobil = Mobil::onlyTrashed()->get();

        return $mobil;
    }

    public function findById($id)
    {
        $mobil = Mobil::find($id);

        return $mobil;
    }

    public function update($data, $id)
    {
        $mobil = Mobil::find($id);
        $mobil->warna = $data["warna"];
        $mobil->harga = $data["harga"];

        return $mobil->save();
    }

    public function delete($id)
    {
        $mobil = Mobil::find($id);

        return $mobil->delete();
    }
}
