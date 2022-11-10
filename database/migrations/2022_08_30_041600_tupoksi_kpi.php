<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TupoksiKpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tupoksi_kpi', function (Blueprint $table) {
            $table->id('id_kpi');
            $table->unsignedBigInteger('id_departemen')->nullable();
            $table->foreign('id_departemen')->references('id_departemen')->on('tupoksi_departemen')->onDelete('set null')->onUpdate('cascade');
            $table->String('kpi');
            $table->String('created_by')->default('0');
            $table->String('progression')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tupoksi_kpi');
    }
}
