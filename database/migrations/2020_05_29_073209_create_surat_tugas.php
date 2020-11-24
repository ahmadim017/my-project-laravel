<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surattugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('notugas');
            $table->date('tgltugas');
            $table->integer('id_usulan');
            $table->integer('id_opd');
            $table->integer('id_pokja');
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
        Schema::dropIfExists('surat_tugas');
    }
}
