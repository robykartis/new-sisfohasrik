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
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->string('id_temuan');
            $table->string('no_rekomendasi');
            $table->text('urian_rekomendasi');
            $table->string('kode_rekomendasi');
            $table->string('status_tlhp');
            $table->string('tgl_tlhp')->nullable();
            $table->string('kode_tlhp')->nullable();
            $table->string('urian_tlhp')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('rekomendasi');
    }
};
