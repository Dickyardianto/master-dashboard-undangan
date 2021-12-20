<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoGalleryMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_gallery_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto_gallery', 200)->nullable();
            $table->integer('id_foto_gallery')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_foto_gallery')
            ->references('id')
            ->on('foto_gallery')
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
        Schema::dropIfExists('foto_gallery_master');
    }
}
