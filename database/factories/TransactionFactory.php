<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => Arr::random(['Pending', 'Belum_Bayar', 'Dikirim', 'Selesai']),
            'user_id' => mt_rand(1, 22),
            'total_harga' => Arr::random(['500000', '600000', '700000', '800000', '900000', '1000000', '15000000', '2000000',]),
            'tgl_transaksi' => $this->faker->date(),
            'tgl_selesai' => $this->faker->date(),
            'categories' => Arr::random(['Product', 'Custom']),
        ];
    }
}
