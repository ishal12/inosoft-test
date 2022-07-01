<?php

declare(strict_types=1);

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Mobil;

class MobilRepository
{
    protected $mobils;

    public function __construct(Mobil $mobils)
    {
        $this->mobils = $mobils;
    }

    public function getAll()
    {
        $mobils = Mobil::all();

        return $mobils;
    }

    public function findById($id)
    {
        $mobils = Mobil::find($id);

        return $mobils;
    }
}
