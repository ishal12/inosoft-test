<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Penjualan;

class PenjualanRepository
{
    protected $penjualans;

    public function __construct(Penjualan $penjualans)
    {
        $this->penjualans = $penjualans;
    }

    public function getAll()
    {
        $penjualans = Penjualan::all();

        return $penjualans;
    }

    public function findById($id)
    {
        $penjualan = Penjualan::find($id);

        return $penjualan;
    }

    public function findByType(string $tipe_kendaraan)
    {
        $penjualans = Penjualan::where(
            "tipe_kendaraan",
            "=",
            $tipe_kendaraan
        )->get();

        return $penjualans;
    }

    public function store($id, string $tipe_kendaraan, $harga)
    {
        $penjualan = Penjualan::create([
            "kendaraan_id" => $id,
            "tipe_kendaraan" => $tipe_kendaraan,
            "harga" => $harga,
        ]);

        return $penjualan;
    }
}
