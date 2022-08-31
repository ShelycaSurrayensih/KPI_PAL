<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeTransPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_trans_plans', function (Blueprint $table) {
            $table->id('id_Tplan');
            $table->unsignedBigInteger('id_trans');
            $table->foreign('id_trans')->references('id_trans')->on('cascade_trans_kpis');
            $table->string('tw');
            $table->string('progress');
            $table->string('keterangan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cascade_trans_plans');
    }
}
