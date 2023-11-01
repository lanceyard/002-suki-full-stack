<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('status', ['Pending', 'Disetujui', 'Pengerjaan', 'Selesai'])->default('Pending');
            $table->enum('jenis_custom', ['Kursi', 'Meja', 'Pagar', 'Pintu', 'Rak', 'Kanopi', 'Lemari']);
            $table->enum('bahan', ['Kayu', 'Baja_Ringan', 'Kaca', 'Stainless']);
            $table->string('desc', 255);
            $table->integer('dp')->default(0);
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
        Schema::dropIfExists('customs');
    }
};
