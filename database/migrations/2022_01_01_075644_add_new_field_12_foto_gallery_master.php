<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewField12FotoGalleryMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foto_gallery_master', function (Blueprint $table) {
            $table->string('foto_gallery_2', 200)->after('foto_gallery_1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foto_gallery_master', function (Blueprint $table) {
            $table->dropColumn('foto_gallery_2');
        });
    }
}
