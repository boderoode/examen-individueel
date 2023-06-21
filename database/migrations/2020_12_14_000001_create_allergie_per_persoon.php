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
        Schema::create('allergie_per_persoon', function (Blueprint $table) {
            $table->id();
            //foreign key naar allergie
            $table->foreignId('allergies_id')->nullable()->constrained('allergies');
            //foreign key naar persoon
            $table->foreignId('persoon_id')->constrained('persoon');
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
