<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesanWanitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besan_wanita', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ayah', 150)->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->integer('id_pengantin_wanita')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_pengantin_wanita')
            ->references('id')
            ->on('pengantin_wanita')
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
        Schema::dropIfExists('besan_wanita');
    }
}
