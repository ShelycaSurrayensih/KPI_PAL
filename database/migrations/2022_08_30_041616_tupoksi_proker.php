<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TupoksiProker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tupoksi_proker', function (Blueprint $table) {
            $table->id('id_proker');
            $table->unsignedBigInteger('id_kpi')->nullable();
            $table->foreign('id_kpi')->references('id_kpi')->on('tupoksi_kpi')->onDelete('set null')->onUpdate('cascade');
            $table->String('proker');
            $table->String('target');
            $table->String('created_by')->default('0');
            $table->String('progression')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tupoksi_proler');
    }
}
