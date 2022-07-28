<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KpiDirektorat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_direktorat', function (Blueprint $table) {
            $table->id('id_kpidir');
            $table->unsignedBigInteger('id_direktorat');
            $table->foreign('id_direktorat')->references('id_direktorat')->on('direktorat');
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi');
            $table->String('desc_kpidir');
            $table->String('satuan');
            $table->String('target');
            $table->String('bobot');
            $table->String('ket');
            $table->String('asal_kpi');
            $table->String('alasan');
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
