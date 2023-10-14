<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('clothes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('genre_id');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('genres');
    }
};