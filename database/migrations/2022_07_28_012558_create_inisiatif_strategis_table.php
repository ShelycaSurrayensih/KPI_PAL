<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInisiatifStrategisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inisiatif_strategis', function (Blueprint $table) {
            $table->id('id_inisiatif');
            $table->string('inisiatif_desc');
            $table->year('tahun_inisiatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inisiatif_strategis');
    }
}
