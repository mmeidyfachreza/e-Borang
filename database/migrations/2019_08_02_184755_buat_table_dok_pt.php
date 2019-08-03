_<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableDokPt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dok_pts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('katdokpt_id')->unsigned();
            $table->foreign('katdokpt_id')
            ->references('id')->on('katdokpts')
            ->onDelete('cascade');
            $table->uuid('uuid')->nullable();
            $table->string('nama');
            $table->string('tahun');
            $table->string('namafile')->nullable();
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
        Schema::table('dok_pts', function (Blueprint $table) {
            $table->dropForeign(['katdokpt_id']);
        });
        Schema::dropIfExists('dok_pts');
    }
}
