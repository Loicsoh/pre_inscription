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
        Schema::table('level', function (Blueprint $table) {
            if (!Schema::hasColumn('level', 'fonction')) {
                $table->string('fonction')->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('level', function (Blueprint $table) {
            $table->dropColumn('fonction');
        });
    }
};