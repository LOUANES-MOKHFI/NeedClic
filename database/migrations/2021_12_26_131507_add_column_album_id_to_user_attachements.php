<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAlbumIdToUserAttachements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_attachements', function (Blueprint $table) {
            //$table->BigInteger('album_id')->unsigned()->after('user_id');
            //$table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_attachements', function (Blueprint $table) {
            //
        });
    }
}
