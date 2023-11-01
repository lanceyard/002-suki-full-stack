<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ProductFactory extends Factory
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
            'harga' => Arr::random(['500000', '600000', '700000', '800000', '900000', '1000000', '15000000', '2000000',]),
            'qty' => mt_rand(1, 20),
            'desc' => $this->faker->paragraph($nb =2),
            'categories' => Arr::random(['Kursi', 'Meja', 'Pagar', 'Pintu', 'Rak', 'Kanopi', 'Lemari']),
        ];
    }
}
