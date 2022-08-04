<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Indhan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indhan', function (Blueprint $table) {
            $table->id('id_indhan');
            $table->unsignedBigInteger('id_tim');
            $table->foreign('id_tim')->references('id_tim')->on('indhan_tim');
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi');
            $table->String('program_strategis');
            $table->String('entitas');
            $table->String('program_utama');
            $table->String('target');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}