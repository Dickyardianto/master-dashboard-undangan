<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendukungMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendukung_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('musik', 150)->nullable();
            $table->string('ayat_quotes', 250)->nullable();
            $table->string('maps', 200)->nullable();
            $table->string('quotes_akhir', 250)->nullable();
            $table->integer('id_pendukung')->unsigned()
            ->nullable()
            ->index();
            $table->timestamps();

            $table->foreign('id_pendukung')
            ->references('id')
            ->on('pendukung')
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
        Schema::dropIfExists('pendukung_master');
    }
}
