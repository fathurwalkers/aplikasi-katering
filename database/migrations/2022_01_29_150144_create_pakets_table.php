<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id();

            $table->string('paket_nama')->nullable();
            $table->integer('paket_harga')->nullable();
            $table->longText('paket_info')->nullable();
            $table->string('paket_kode')->nullable();
            $table->string('paket_status')->nullable(); // Tersedia / Tidak Tersedia

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
