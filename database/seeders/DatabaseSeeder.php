<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Custom;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::factory(10)->create();
    Role::create([
      'name' => "Admin"
    ]);

    Role::create([
      'name' => "User"
    ]);

    User::factory()->create([
      'name' => "Raihan Achmad",
      'email' => "r@r.com",
      'username' => "rehan",
      'password' => bcrypt("hahaha"),
      'role_id' => 1,
    ]);

    User::factory()->create([
      'name' => "Daffa Afifi Syahrony",
      'email' => "d@d.com",
      'username' => "daffa",
      'password' => bcrypt("hahaha"),
      'role_id' => 1,
    ]);

    Product::factory(5)->create();

    Transaction::create([
      'user_id' => 1,
    ]);

    Transaction::create([
      'user_id' => 1,
      'categories' => "Custom"
    ]);

    TransactionDetail::create([
      'transaction_id' => 1,
      'product_id' => 1,
    ]);

    TransactionDetail::create([
      'transaction_id' => 1,
      'product_id' => 2,
    ]);

    Wishlist::create([
      'user_id' => 1,
      'product_id' => 3,
    ]);

    Wishlist::create([
      'user_id' => 1,
      'product_id' => 2,
    ]);
    

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
