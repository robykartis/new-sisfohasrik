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
        Schema::create('penarikan_kerugian', function (Blueprint $table) {
            $table->id();
            $table->string('id_temuan');
            $table->string('jns_kerugian');
            $table->string('tgl_penarikan');
            $table->string('jml_penarikan_neg')->nullable();
            $table->string('jml_penarikan_drh')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('penarikan_kerugian');
    }
};