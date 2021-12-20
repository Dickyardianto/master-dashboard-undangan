<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdClientToPengantinPriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengantin_pria', function (Blueprint $table) {
            $table->integer('id_client')->after('nama_pengantin_pria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengantin_pria', function (Blueprint $table) {
            $table->dropColumn('id_client');
        });
    }
}
