<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();
      $table->string('bukti_bayar')->nullable();
      $table->string('alamat')->nullable();
      $table->integer('total_harga')->default(0);
      $table->date('tgl_transaksi')->nullable();
      $table->date('tgl_selesai')->nullable();
      $table->enum('categories', ['Product', 'Custom'])->default('Product');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('transactions');
  }
};
