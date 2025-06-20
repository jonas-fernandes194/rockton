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
        Schema::create('musics_albuns_bands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('music_id')->constrained('musics');
            $table->foreignId('band_id')->constrained('bands');
            $table->foreignId('album_id')->constrained('albuns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musics_albuns_bands');
    }
};
