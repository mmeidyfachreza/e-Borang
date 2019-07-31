<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->string('nama');
            $table->string('tahun');
            $table->string('namafile')->nullable();
            $table->enum('publikasi',['ya','tidak']);
            $table->integer('kat_dokumen_id')->unsigned();
            $table->timestamps();
            $table->foreign('kat_dokumen_id')->references('id')->on('kat_dokumens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['kat_dokumen_id']);
        $table->dropColumn('kat_dokumen_id');
        Schema::dropIfExists('dokumen');
    }
}
