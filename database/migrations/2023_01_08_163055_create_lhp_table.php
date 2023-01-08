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
            $table->string('tahun');
            $table->string('obrik');
            $table->string('klarifikasi');
            $table->timestamp('tgl_lhp');
            $table->string('jns_pemeriksaan');
            $table->string('uraian')->nullable();
            $table->string('create_by');
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
