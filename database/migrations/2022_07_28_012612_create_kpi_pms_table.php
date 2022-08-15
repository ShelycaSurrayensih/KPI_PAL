<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiPmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_pms', function (Blueprint $table) {
            $table->id('id_kpipms');
            $table->unsignedBigInteger('id_kat');
            $table->foreign('id_kat')->references('id_kat')->on('kategori_pms')->onDelete('cascade');
            $table->unsignedBigInteger('id_inisiatif');
            $table->foreign('id_inisiatif')->references('id_inisiatif')->on('inisiatif_strategis')->onDelete('cascade');
            $table->string('sub_kat');
            $table->text('kpi_desc');
            $table->string('polaritas');
            $table->string('bobot');
            $table->string('target');
            $table->integer('div_lead');
            //$table->foreign('div_lead')->references('id_divisi')->on('divisi');
            // $table->string('staging')->default(1);
            $table->year('tahun_kpipms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_pms');
    }
}
