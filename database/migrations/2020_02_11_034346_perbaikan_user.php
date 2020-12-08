<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerbaikanUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function (Blueprint $table){
        $table->string("username")->unique();
        $table->enum("roles",["ADMIN","USER","AUDITOR"]);
        $table->text("alamat");
        $table->string("telpon");
        $table->enum("status",["ACTIVE","INACTIVE"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('users', function (Blueprint $table){
            $table->dropColumn("username");
            $table->dropColumn("roles");
            $table->dropColumn("alamat");
            $table->dropColumn("telpon");
            $table->dropColumn("status");
        });
    }
}
