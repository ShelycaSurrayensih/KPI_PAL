<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiPmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_pms', function (Blueprint $table) {
            $table->id('id_real');
            $table->unsignedBigInteger('id_plan');
            $table->foreign('id_plan')->references('id_plan')->on('plan_pms');
            $table->string('progres_real');
            $table->text('desc_real');
            $table->text('kendala');
            $table->text('file_evidence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_pms');
    }
}