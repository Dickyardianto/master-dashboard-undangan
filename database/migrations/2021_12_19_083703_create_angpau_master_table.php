<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngpauMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angpau_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_pembayaran', 200)->nullable();
            $table->string('no_pembayaran', 100)->nullable();
            $table->string('atas_nama_pembayaran', 150)->nullable();
            $table->integer('id_angpau')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_angpau')
            ->references('id')
            ->on('angpau')
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
        Schema::dropIfExists('angpau_master');
    }
}
