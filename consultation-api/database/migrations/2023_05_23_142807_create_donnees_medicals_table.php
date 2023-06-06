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
        Schema::create('donnees_medicals', function (Blueprint $table) {
            $table->id();
            $table->integer('sexe');
            $table->integer('hypertension');
            $table->integer('probleme_cardiaque');
            $table->integer('bmi');
            $table->integer('glucose');
            $table->integer('fumeur');
            $table->integer('hbaic');

            $table->foreignId('patient_id')->references('id')->on('patients');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donnees_medicals');
    }
};
