<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepsiMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resepsi_master', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_resepsi')->unsigned()
            ->nullable()
            ->index();
            $table->date('tanggal_resepsi');
            $table->time('pukul');
            $table->string('lokasi_resepsi', 200)->nullable();
            $table->timestamps();

            $table->foreign('id_resepsi')
            ->references('id')
            ->on('resepsi')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resepsi_master');
    }
}
