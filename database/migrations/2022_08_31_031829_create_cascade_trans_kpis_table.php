<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeTransKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_trans_kpis', function (Blueprint $table) {
            $table->id('id_trans');
            $table->String('kpi_trans');
            $table->String('kpi_div');
            $table->String('target_divisi');
            $table->String('bobot_kpi');
            $table->String('bobot_cascade');
            $table->String('bkXbc');
            $table->unsignedBigInteger('div_lead');
            $table->foreign('div_lead')->references('id_divisi')->on('divisi');
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
        Schema::dropIfExists('cascade_trans_kpis');
    }
}
