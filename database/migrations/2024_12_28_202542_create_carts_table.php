<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('user_id');  // Ganti dengan user_id sesuai kebutuhan
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('carts');
    }

};
