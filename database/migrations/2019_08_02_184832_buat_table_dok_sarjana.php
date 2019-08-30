<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDokSarjana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_sarjanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('katdoksarjana_id')->unsigned();
            $table->foreign('katdoksarjana_id')
            ->references('id')->on('katdoksarjanas')
            ->onDelete('cascade');
            $table->uuid('uuid')->nullable();
            $table->string('nama',50);
            $table->string('tahun',10);
            $table->string('namafile',50)->nullable();
            $table->enum('publikasi',['ya','tidak']);
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
        Schema::table('dok_sarjanas', function (Blueprint $table) {
            $table->dropForeign(['kat_dok_sarjana_id']);
        });
        Schema::dropIfExists('dok_sarjanas');
    }
}
