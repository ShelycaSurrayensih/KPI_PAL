<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TupoksiRealisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tupoksi_realisasi', function (Blueprint $table) {
            $table->id('id_realisasi');
            $table->String('progres');
            $table->String('deskripsi');
            $table->unsignedBigInteger('id_tw')->nullable();
            $table->foreign('id_tw')->references('id_tw')->on('tupoksi_tw')->onDelete('set null')->onUpdate('cascade');
           
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