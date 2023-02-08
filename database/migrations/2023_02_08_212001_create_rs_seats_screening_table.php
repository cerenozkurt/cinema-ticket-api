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
        Schema::create('rs_seats_screening', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seat_id')->references('id')->on('seats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('screening_id')->references('id')->on('screenings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_seats_screening');
    }
};
