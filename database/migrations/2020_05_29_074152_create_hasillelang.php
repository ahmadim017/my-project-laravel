<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasillelang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasillelang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nohasil');
            $table->date('tglhasil');
            $table->integer('id_tugas');
            $table->string('namapemenang');
            $table->String('npwp');
            $table->string('hargapenawaran');
            $table->string('hargaterkoreksi');
            $table->date('tglsppbj');
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
        Schema::dropIfExists('hasillelang');
    }
}
