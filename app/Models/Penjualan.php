<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $connection = "mongodb";
    protected $collection = "penjualans";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["kendaraan_id", "tipe_kendaraan", "harga"];
}
