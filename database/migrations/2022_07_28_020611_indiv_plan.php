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
        Schema::create('indiv_realisasi', function (Blueprint $table) {
            $table->id('id_realisasi');
            $table->unsignedBigInteger('id_kpidir')->nullable();
            $table->foreign('id_kpidir')->references('id_kpidir')->on('indiv_kpidir')->onDelete('set null')->onUpdate('cascade');
            $table->String('tw');
            $table->String('progres');
            $table->String('realisasi');
            $table->String('prognosa');
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('set null')->onUpdate('cascade');
            $table->string('comment')->default('Belum ada Komentar');
            $table->String('kendala')->nullable();
            $table->String('file_evidence')->nullable();
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
        Schema::dropIfExists('indiv_plan');
    }
}