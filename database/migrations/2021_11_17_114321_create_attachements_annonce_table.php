<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachementsAnnonceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachements_annonce', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',999);
            $table->integer('user_id');
            $table->unsignedBigInteger('annonce_id')->nullable();
            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachements_annonce');
    }
}
