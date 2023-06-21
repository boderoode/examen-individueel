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
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('omschrijving');
            $table->string('Anafylactisch_risico');
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
