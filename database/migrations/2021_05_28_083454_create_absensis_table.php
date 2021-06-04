<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('absensi_id');
            $table->unsignedBigInteger('krs_id');
            $table->unsignedBigInteger('pertemuan_id');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('durasi');
            $table->timestamps();

            $table->foreign('krs_id')->references('krs_id')->on('krs')->onUpdate('cascade');
            $table->foreign('pertemuan_id')->references('pertemuan_id')->on('pertemuans')->onUpdate('cascade');
            $table->unique(['krs_id', 'pertemuan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
