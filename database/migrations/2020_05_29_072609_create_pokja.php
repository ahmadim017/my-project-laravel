<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namapokja');
            $table->enum("status",["ACTIVE","INACTIVE"]);
            $table->string('id_user');
            $table->date('tglpembuatan');
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
        Schema::dropIfExists('pokja');
    }
}
