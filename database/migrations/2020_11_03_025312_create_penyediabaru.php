<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyediabaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyediabaru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaperusahaan');
            $table->enum('bentukusaha',['CV','PT']);
            $table->string('npwp');
            $table->text('alamat');
            $table->string('email');
            $table->string('telp');
            $table->string('file');
            $table->string('nama_file');
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
        Schema::dropIfExists('penyediabaru');
    }
}
