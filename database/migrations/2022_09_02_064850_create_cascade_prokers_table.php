<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeProkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_prokers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_CDiv');
            $table->foreign('id_CDiv')->references('id')->on('cascade_kpi_divs')->onDelete('cascade');
            $table->string('tw');
            $table->string('progress');
            $table->string('deskripsi');
            $table->string('comment')->default('Belum ada Komentar');
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
        Schema::dropIfExists('cascade_prokers');
    }
}
