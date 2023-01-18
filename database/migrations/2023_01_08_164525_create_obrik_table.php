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
        Schema::create('obrik', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kode');
            $table->string('klarifikasi');
            $table->string('nama');
            $table->string('induk');
            $table->string('created_by');
            $table->string('created_by_id');
            $table->string('updated_by')->nullable();
            $table->string('updated_by_id')->nullable();
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
        Schema::dropIfExists('obrik');
    }
};
