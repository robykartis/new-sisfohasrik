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
            $table->date('tgl_penarikan');
            $table->decimal('jml_penarikan_neg', 13, 0)->nullable();
            $table->decimal('jml_penarikan_drh', 13, 0)->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('penarikan_kerugian');
    }
};
