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
        Schema::create('temuan', function (Blueprint $table) {
            $table->id();
            $table->string('id_temuan');
            $table->string('id_lhp');
            $table->string('bidang_temuan');
            $table->string('no_temuan');
            $table->string('judul_temuan');
            $table->text('urian_temuan');
            $table->string('kode_temuan');
            $table->string('jml_rnd_neg')->nullable();
            $table->string('jml_rnd_drh')->nullable();
            $table->string('jml_snd_neg')->nullable();
            $table->string('jml_snd_drh')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('temuan');
    }
};
