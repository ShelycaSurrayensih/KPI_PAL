<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanIndDirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan_ind_dirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kpi_d_id');
            $table->foreign('kpi_d_id')->references('id')->on('kpi_divisis');
            $table->string('periode');
            $table->string('realisasi');
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
        Schema::dropIfExists('pelaporan_ind_dirs');
    }
}
