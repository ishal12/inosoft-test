<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Mobil;
use App\Models\Motor;

class KendaraanRepository
{
    protected $mobils;
    protected $motors;
    protected $kendaraans;

    public function __construct(Mobil $mobils, Motor $motors)
    {
        $this->mobils = $mobils;
        $this->motors = $motors;
    }

    public function getAll()
    {
        $mobils = Mobil::all();
        $motors = Motor::all();

        $kendaraans = $mobils->merge($motors)->sortByDesc('harga');

        return $kendaraans->values()->all();;
    }
}
