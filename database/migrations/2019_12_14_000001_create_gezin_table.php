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
        Schema::create('gezin', function (Blueprint $table) {
            $table->id();
            //naam van gezin
            $table->string('naam');
            //code
            $table->string('code');
            //omschrijving met enumerations gedaan
            $table->string('omschrijving');
            //aantal volwassenen
            $table->integer('aantal_volwassenen');
            //aantal kinderen
            $table->integer('aantal_kinderen');
            //aantal babys
            $table->integer('aantal_babys');
            //totaal aantal personen
            $table->integer('totaal_aantal_personen');
            //IsActief
            $table->boolean('IsActief');
            //Opmerking
            $table->string('Opmerking')->nullable();
            //Pak de huidige actuele tijd voor datum_aangemaakt en datum_gewijzigd
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
