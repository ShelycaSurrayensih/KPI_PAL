<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndivKpidir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indiv_kpidir', function (Blueprint $table) {
            $table->id('id_kpidir');
            $table->unsignedBigInteger('id_direktorat')->nullable();
            $table->foreign('id_direktorat')->references('id_direktorat')->on('direktorat')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('set null')->onUpdate('cascade');
            $table->String('desc_kpidir');
            $table->String('satuan');
            $table->String('target');
            $table->String('bobot');
            $table->String('ket');
            $table->String('asal_kpi');
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
        Schema::dropIfExists('indiv_kpidir');
    }
}