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
        Schema::create('level', function (Blueprint $table) {
    $table->id();
    $table->date('obtention');
    $table->string('serie');
    $table->string('mention');
    $table->string('etablissement');
    $table->string('chxspecialite')->nullable();
    $table->string('fonction')->nullable();
    $table->enum('hebergement', ['parental', 'externale', 'autre'])->nullable();
    $table->string('quartier')->nullable();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('specialite_id')->nullable();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
    $table->foreign('specialite_id')->references('id')->on('specialite')->onDelete('set null');
    $table->softDeletes(); // pour la suppression douce 
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level');
    }
};