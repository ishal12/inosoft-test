<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Motor;

class MotorFactory extends Factory
{
    protected $model = Motor::class;
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
            'harga' => $this->faker->randomFloat(2, 10000000, 100000000),
            'mesin' => $this->faker->randomElement(['External Combustion' ,'Internal Combustion', 'Mesin Tak']),
            'tipe_suspensi' => $this->faker->randomElement(['Pararel Fork' ,'Plunger Rear Suspension', 'Telescopic Fork', 'Telescopic Up Side Down', 'Swing Arm Rear Suspension']),
            'tipe_transmisi' => $this->faker->randomElement(['Manual' ,'CVT', 'DCT']),
        ];
    }
}
