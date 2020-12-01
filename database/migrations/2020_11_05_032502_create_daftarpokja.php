<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarpokja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarpokja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('golongan');
            $table->string('nip');
            $table->enum('status',['ACTIVE','INACTIVE'])->nullable();
            $table->enum('role',['POKJA','KEPALA UKPBJ','PPTK'])->nullable();
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
        Schema::dropIfExists('daftarpokja');
    }
}
