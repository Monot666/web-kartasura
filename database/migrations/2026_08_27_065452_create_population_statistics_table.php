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
        Schema::create('population_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('rt');
            $table->string('rw');
            $table->integer('male_count')->default(0); // Laki-laki
            $table->integer('female_count')->default(0); // Perempuan
            $table->integer('birth_count')->default(0); // Kelahiran
            $table->integer('death_count')->default(0); // Kematian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_statistics');
    }
};
