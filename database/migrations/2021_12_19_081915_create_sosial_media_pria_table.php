<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosialMediaPriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosial_media_pria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instagram', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->integer('id_pengantin_pria')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_pengantin_pria')
            ->references('id')
            ->on('pengantin_pria')
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
        Schema::dropIfExists('sosial_media_pria');
    }
}
