<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('band_album_music', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('band_id');
            $table->unsignedBigInteger('music_id');
            $table->unsignedBigInteger('album_id');
            $table->foreign('band_id')->references('id')->on('bands');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('music_id')->references('id')->on('musics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('band_album_music');
    }
};
