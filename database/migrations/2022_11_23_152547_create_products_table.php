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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name', 100);
            $table->string('desc', 255);
            $table->integer('harga')->default(0);
            $table->integer('qty');
            $table->enum('categories', ['Kursi', 'Meja', 'Pagar', 'Pintu', 'Rak', 'Kanopi', 'Lemari']);
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
        Schema::dropIfExists('products');
    }
};
