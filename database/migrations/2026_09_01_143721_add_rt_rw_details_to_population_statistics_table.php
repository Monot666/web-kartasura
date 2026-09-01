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
        Schema::table('population_statistics', function (Blueprint $table) {
        $table->string('rt_name')->nullable()->after('rw');
        $table->string('rt_photo_path')->nullable()->after('rt_name');
        $table->string('rw_name')->nullable()->after('rt_photo_path');
        $table->string('rw_photo_path')->nullable()->after('rw_name');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('population_statistics', function (Blueprint $table) {
        $table->dropColumn(['rt_name', 'rt_photo_path', 'rw_name', 'rw_photo_path']);
    });
    }
};
