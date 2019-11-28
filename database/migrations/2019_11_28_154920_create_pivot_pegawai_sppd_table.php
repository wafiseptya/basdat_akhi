<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotPegawaiSppdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_sppd', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('id_pegawai');
          $table->unsignedBigInteger('id_sppd');
          $table->unsignedBigInteger('updated_by');
          $table->foreign('id_pegawai')->references('id')->on('pegawai');
          $table->foreign('id_sppd')->references('id')->on('surat_perjalanan');
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
        Schema::dropIfExists('pegawai_sppd');
    }
}
