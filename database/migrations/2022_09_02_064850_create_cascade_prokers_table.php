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
            $table->unsignedBigInteger('id_CKpi');
            $table->foreign('id_CKpi')->references('id')->on('cascade_kpis')->onDelete('cascade');
            $table->string('tw');
            $table->string('progress');
            $table->string('deskripsi');
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
