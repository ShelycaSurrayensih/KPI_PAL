<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Divisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Divisi', function (Blueprint $table) {
            $table->id('id_divisi');
            $table->String('div_name');
            $table->String('username');
            $table->unsignedBigInteger('id_direktorat');
            $table->foreign('id_direktorat')->references('id_direktorat')->on('direktorat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisi');
    }
}