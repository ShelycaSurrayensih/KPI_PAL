<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanLpmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan_lpms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('is_id');
            $table->foreign('is_id')->references('id')->on('inisiatif_strategis');
            $table->string('realisasi');
            $table->string('kendala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaporan_lpms');
    }
}
