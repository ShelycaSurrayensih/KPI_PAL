<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_pms', function (Blueprint $table) {
            $table->id('id_plan');
            $table->unsingnedBigInteger('id_kpipms');
            $table->foreign('id_kpimpms')->references('id_kpimpms')->on('kpi_pms');
            $table->int('tw');
            $table->string('progress_plan');
            $table->text('desc_progress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_pms');
    }
}
