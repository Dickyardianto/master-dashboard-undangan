<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pengantin_pria')->unsigned()
            ->nullable()
            ->index();
            $table->integer('id_pengantin_wanita')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_pengantin_pria')
            ->references('id')
            ->on('pengantin_pria')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('foto_gallery');
    }
}
