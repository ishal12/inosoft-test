<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mobil;

class MobilFactory extends Factory
{
    protected $model = Mobil::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->year(),
            'warna' => $this->faker->safeColorName(),
            'harga' => $this->faker->randomFloat(2, 100000000, 1000000000),
            'mesin' => $this->faker->randomElement(['External Combustion' ,'Internal Combustion', 'Mesin Tak']),
            'kapasitas_penumpang' => $this->faker->randomElement([2,4, 6, 8]),
            'tipe' => $this->faker->randomElement(['MPV' ,'SUV', 'Sport Car', 'Convertible', 'Hatchback', 'Sedan']),
        ];
    }
}
