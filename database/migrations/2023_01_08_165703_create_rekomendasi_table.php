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
            $table->text('uraian_rekomendasi');
            $table->string('kode_rekomendasi');
            $table->enum('status_tlhp', ['S', 'B', 'D'])->default('B');
            $table->string('tgl_tlhp')->nullable();
            $table->string('kode_tlhp')->nullable();
            $table->string('uraian_tlhp')->nullable();
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
        Schema::dropIfExists('rekomendasi');
    }
};
