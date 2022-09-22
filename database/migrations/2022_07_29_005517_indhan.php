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
            $table->unsignedBigInteger('id_tim')->nullable();
            $table->foreign('id_tim')->references('id_tim')->on('indhan_tim')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('set null')->onUpdate('cascade');
            $table->String('program_strategis');
            $table->String('entitas');
            $table->String('program_utama');
            $table->String('target');
            $table->String('created_by')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indhan');
    }
}