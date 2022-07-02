<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use App\Models\Kendaraan;

class Mobil extends Kendaraan
{
    protected $connection = "mongodb";
    protected $collection = "mobils";

    public function __construct(array $attributes = [])
    {
        $fillable = ["mesin", "kapasitas_penumpang", "tipe"];

        parent::__construct($attributes);
        $this->mergeFillable($this->fillable);
    }
}
