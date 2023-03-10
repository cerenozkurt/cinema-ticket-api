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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('duration_min');
            $table->foreignId('director_id')->references('id')->on('directors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('media_id')->nullable()->references('id')->on('medias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('language_id')->references('id')->on('movie_languages')->onUpdate('cascade')->onDelete('cascade');
            $table->json('movie_warnings')->nullable();
            $table->text('trailer_url')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('movies');
    }
};
