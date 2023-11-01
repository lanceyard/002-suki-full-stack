<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Custom>
 */
class CustomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'status' => Arr::random(['Pending','Pengerjaan', 'Selesai']),
            'jenis_custom' => Arr::random(['Kursi', 'Meja', 'Pagar', 'Pintu', 'Rak', 'Kanopi', 'Lemari']),
            'bahan' => Arr::random(['Kayu', 'Stainless', 'Kaca', 'Baja_Ringan']),
            'desc' => $this->faker->paragraph($nb =2),
            'dp' => Arr::random(['500000', '600000', '700000', '800000', '900000', '1000000', '15000000', '2000000',]),
            'total_harga' => Arr::random(['500000', '600000', '700000', '800000', '900000', '1000000', '15000000', '2000000',]),
            'transaction_id' => Arr::random([1, 2, 3, 13, 14, 15, 16, 18]),
        ];
    }
}
