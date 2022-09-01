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
            $table->String('tw');
            $table->String('progres');
            $table->unsignedBigInteger('id_proker')->nullable();
            $table->foreign('id_proker')->references('id_proker')->on('tupoksi_proker')->onDelete('set null')->onUpdate('cascade');
           
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