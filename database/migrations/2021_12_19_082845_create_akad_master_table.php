<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkadMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akad_master', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_akad')->unsigned()
            ->nullable()
            ->index();
            $table->date('tanggal_akad');
            $table->time('pukul');
            $table->string('lokasi_akad', 200)->nullable();
            $table->timestamps();

            $table->foreign('id_akad')
            ->references('id')
            ->on('akad')
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
        Schema::dropIfExists('akad_master');
    }
}
