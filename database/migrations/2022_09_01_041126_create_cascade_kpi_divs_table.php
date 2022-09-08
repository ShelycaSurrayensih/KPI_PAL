<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeKpiDivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_kpi_divs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_CasKpi');
            $table->foreign('id_CasKpi')->references('id')->on('cascade_kpis')->onDelete('cascade');
            $table->string('kpi_divisi');
            $table->float('bobot_cascade');
            $table->string('target');
            $table->float('bkXbc');
            $table->boolean('status_div');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cascade_kpi_divs');
    }
}
