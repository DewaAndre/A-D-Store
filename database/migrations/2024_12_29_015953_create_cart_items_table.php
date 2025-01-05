<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key
            // Relasi ke tabel carts
            $table->foreignId('id_cart')->constrained('carts')->onDelete('cascade');
            // Relasi ke tabel images
            $table->foreignId('id_image')->constrained('images')->onDelete('cascade');
            $table->integer('quantity'); // Jumlah item dalam keranjang
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
