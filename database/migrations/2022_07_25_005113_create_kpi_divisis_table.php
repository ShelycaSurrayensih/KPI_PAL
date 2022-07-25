<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiDivisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('target');
            $table->unsignedBigInteger('kpi_k_id');
            $table->foreign('kpi_k_id')->references('id')->on('kpi_korporasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_divisis');
    }
}
