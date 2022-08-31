<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeTransRealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_trans_reals', function (Blueprint $table) {
            $table->id('id_Treal');
            $table->unsignedBigInteger('id_Tplan');
            $table->foreign('id_Tplan')->references('id_Tplan')->on('cascade_trans_plans');
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
        Schema::dropIfExists('cascade_trans_reals');
    }
}
