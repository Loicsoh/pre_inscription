<?php

use App\Models\Specialite;
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
            $table->renameColumn('specialite','chxspecialite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('level', function (Blueprint $table){
            $table->renameColumn('chxspecialite', 'specialite');
        });
    }
};