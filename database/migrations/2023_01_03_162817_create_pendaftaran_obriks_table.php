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
        Schema::create('pendaftaran_obriks', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kode');
            $table->unsignedBigInteger('klarifikasi');
            $table->string('nama');
            $table->string('induk');
            $table->timestamps();

            $table->foreign('klarifikasi')->references('id')->on('klarifikasi_obriks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_obriks');
    }
};
