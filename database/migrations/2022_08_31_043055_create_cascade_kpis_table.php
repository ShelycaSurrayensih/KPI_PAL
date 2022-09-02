<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_kpis', function (Blueprint $table) {
            $table->id();
            $table->string('cas_kpiName');
            $table->unsignedBigInteger('id_kat');
            $table->foreign('id_kat')->references('id_kat')->on('cascade_kats')->onDelete('cascade');
            $table->float('bobot_kpi');
            $table->float('bobot_cascade');
            $table->string('bkXbc');
            $table->text('target');
            $table->unsignedBigInteger('div_lead');
            $table->foreign('div_lead')->references('id_divisi')->on('divisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cascade_kpis');
    }
}
