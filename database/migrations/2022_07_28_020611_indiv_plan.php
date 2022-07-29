<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndivPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indiv_plan', function (Blueprint $table) {
            $table->id('id_plan');
            $table->unsignedBigInteger('id_kpidir');
            $table->foreign('id_kpidir')->references('id_kpidir')->on('indiv_kpidir');
            $table->String('tw');
            $table->String('prognosa');
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi');
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