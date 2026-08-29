<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('population_statistics', function (Blueprint $table) {
            $table->string('month')->nullable()->after('rw');
            $table->integer('year')->nullable()->after('month');
        });
    }

    public function down(): void
    {
        Schema::table('population_statistics', function (Blueprint $table) {
            $table->dropColumn(['month', 'year']);
        });
    }
};