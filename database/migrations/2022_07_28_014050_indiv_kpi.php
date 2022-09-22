<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndivKpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indiv_kpi', function (Blueprint $table) {
            $table->id('id_kpi');
            $table->String('desc_kpi');
            $table->String('bobot');
            $table->String('target_divisi');
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('set null')->onUpdate('cascade');
            $table->String('total');
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
        Schema::dropIfExists('indiv_kpi');
    }
}