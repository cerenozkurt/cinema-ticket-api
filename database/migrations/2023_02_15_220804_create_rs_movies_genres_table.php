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
        Schema::create('rs_movies_genres', function (Blueprint $table) {
            $table->foreignId('genre_id')->references('id')->on('movie_genres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('movie_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_movies_genres');
    }
};
