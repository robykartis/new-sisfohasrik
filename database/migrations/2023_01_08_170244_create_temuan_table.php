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
            $table->string('id_lhp'); // ini menampung id table lhp 
            $table->string('bidang_temuan'); //ini menampung id table kode_temuan mengabil data field nama
            $table->string('no_temuan');
            $table->string('judul_temuan');
            $table->text('urian_temuan');
            $table->string('kode_temuan'); //ini menampung kode temuan di table kode_temuan mengambil data field kode
            $table->decimal('jml_rnd_neg', 13, 0)->nullable();
            $table->decimal('jml_rnd_drh', 13, 0)->nullable();
            $table->decimal('jml_snd_neg', 13, 0)->nullable();
            $table->decimal('jml_snd_drh', 13, 0)->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('temuan');
    }
};
