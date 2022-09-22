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
            $table->unsignedBigInteger('id_kpipms');
            $table->foreign('id_kpipms')->references('id_kpipms')->on('kpi_pms')->onDelete('cascade');
            $table->String('bulan');
            $table->year('tahun');
            $table->string('progress_plan');
            $table->text('desc_plan');
            $table->string('comment')->default('Belum ada Komentar');
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
        Schema::dropIfExists('plan_pms');
    }
}
