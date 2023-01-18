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
        Schema::create('kode_golongan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('golongan');
            $table->string('pangkat');
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
        Schema::dropIfExists('kode_golongan');
    }
};
