<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdClientForeignKeyToBesanPriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('besan_pria', function (Blueprint $table) {
            $table->integer('id_client')->after('id')->unsigned()
            ->nullable()
            ->index();

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
        Schema::table('besan_pria', function (Blueprint $table) {
            $table->dropColumn('id_client');
        });
    }
}
