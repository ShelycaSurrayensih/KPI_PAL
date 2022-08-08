<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndhanRealisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indhan_realisasi', function (Blueprint $table) {
            $table->id('id_realisasi');
            $table->unsignedBigInteger('id_indhan')->nullable();
            $table->foreign('id_indhan')->references('id_indhan')->on('indhan')->onDelete('set null')->onUpdate('cascade');
            $table->String('realisasi');
            $table->String('bulan');
            $table->year('tahun');
            $table->String('kendala');
            $table->created_at();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indhan_realisasi');
    }
}