<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratperjalananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_perjalanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('biaya_perjalanan');
            $table->unsignedBigInteger('id_pembuat_komitmen');
            $table->unsignedBigInteger('id_kabupaten');
            $table->unsignedBigInteger('id_mata_anggaran')->nullable();
            $table->unsignedBigInteger('id_pembebanan_anggaran');
            $table->unsignedBigInteger('id_waktu_perjalanan');
            $table->unsignedBigInteger('id_kendaraan');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('updated_by');
            $table->foreign('id_pembuat_komitmen')->references('id')->on('pejabat_pembuat_komitmen');
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten');
            $table->foreign('id_mata_anggaran')->references('id')->on('mata_anggaran');
            $table->foreign('id_pembebanan_anggaran')->references('id')->on('pembebanan_anggaran');
            $table->foreign('id_waktu_perjalanan')->references('id')->on('waktu_perjalanan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SuratPerjalanan');
    }
}
