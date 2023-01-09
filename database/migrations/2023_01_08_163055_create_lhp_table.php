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
        Schema::create('lhp', function (Blueprint $table) {
            $table->id();
            $table->string('no_lhp');
            $table->string('tahun')->nullable();
            $table->string('obrik')->nullable();
            $table->string('klarifikasi')->nullable();
            $table->timestamp('tgl_lhp');
            $table->string('jns_pemeriksaan')->nullable();
            $table->string('uraian')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('lhp');
    }
};
