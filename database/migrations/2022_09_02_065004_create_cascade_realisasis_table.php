<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCascadeRealisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cascade_realisasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_CProk');
            $table->foreign('id_CProk')->references('id')->on('cascade_prokers')->onDelete('cascade');
            $table->string('progress')->default('Belum Terisi');
            $table->string('deskripsi')->default('Belum Terisi');
            $table->string('evidence')->default('NO');
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
        Schema::dropIfExists('cascade_realisasis');
    }
}
