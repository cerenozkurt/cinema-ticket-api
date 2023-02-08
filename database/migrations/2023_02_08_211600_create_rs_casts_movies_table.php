<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_casts_movies', function (Blueprint $table) {
            $table->foreignId('cast_id')->references('id')->on('casts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('movie_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_casts_movies');
    }
};
