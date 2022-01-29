<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();

            $table->string('pemesanan_kode')->nullable();
            $table->string('pemesanan_jumlah')->nullable();
            $table->string('pemesanan_status')->nullable(); // PENDING - SUKSES

            $table->unsignedBigInteger('login_id')->nullable();
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->unsignedBigInteger('paket_id')->nullable();
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
