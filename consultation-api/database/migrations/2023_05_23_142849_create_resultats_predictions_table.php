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
        Schema::create('resultats_predictions', function (Blueprint $table) {
            $table->id();
            $table->float('probabilite_positive');
            $table->float('probabilite_negative');
            $table->string('resultat_prediction');
            $table->boolean('valide');

            $table->timestamps();

            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->foreignId('medecin_id')->references('id')->on('users');
            $table->foreignId('donnees_id')->references('id')->on('donnees_medicals');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats_predictions');
    }
};
