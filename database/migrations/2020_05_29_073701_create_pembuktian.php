<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembuktian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembuktian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nopembuktian');
            $table->date('tglpembuktian');
            $table->string('file_pembuktian')->nullable();
            $table->string('nama_file')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->integer('id_tugas');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('pembuktian');
    }
}
