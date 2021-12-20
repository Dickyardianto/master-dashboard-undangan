<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatNikahMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_nikah_master', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alamat_nikah')->unsigned()
            ->nullable()
            ->index();
            $table->string('alamat_nikah', 200)->nullable();
            $table->date('tanggal_nikah');
            $table->timestamps();

            $table->foreign('id_alamat_nikah')
            ->references('id')
            ->on('alamat_nikah')
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
        Schema::dropIfExists('alamat_nikah_master');
    }
}
