<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use App\Models\Kendaraan;

class Motor extends Kendaraan
{
    protected $connection = "mongodb";
    protected $collection = "motors";

    public function __construct(array $attributes = [])
    {
        $fillable = ["mesin", "tipe_suspensi", "tipe_transmisi"];

        parent::__construct($attributes);
        $this->mergeFillable($this->fillable);
    }
}
