<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableKategoriDokDiploma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katdokdiplomas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',25);
            $table->string('deskripsi',50);
            $table->string('slug_judul');
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
        Schema::dropIfExists('kat_dokumen_diplomas');
    }
}
