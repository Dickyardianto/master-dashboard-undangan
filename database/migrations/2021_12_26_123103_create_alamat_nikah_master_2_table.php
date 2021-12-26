<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatNikahMaster2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_nikah_master_2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned()
            ->nullable()
            ->index();
            $table->string('alamat_nikah', 200)->nullable();
            $table->date('tanggal_nikah');
            $table->timestamps();

            $table->foreign('id_client')
            ->references('id')
            ->on('tema')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_nikah_master_2');
    }
}
