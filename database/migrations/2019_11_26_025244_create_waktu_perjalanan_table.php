<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuPerjalananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_perjalanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lama_perjalanan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_harus_berangkat');
            $table->integer('jumlah_hari_menginap');
            $table->date('tanggal_dikeluarkan_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_perjalanan');
    }
}
