<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerubahanpenyedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perubahanpenyedia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaperusahaan');
            $table->enum('bentukusaha',['CV','PT']);
            $table->text('alamat');
            $table->string('telp');
            $table->string('npwp');
            $table->string('email');
            $table->string('file');
            $table->string('nama_file');
            $table->text('keterangan');
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
        Schema::dropIfExists('perubahanpenyedia');
    }
}
