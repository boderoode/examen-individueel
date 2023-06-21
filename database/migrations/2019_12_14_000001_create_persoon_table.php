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
        Schema::create('persoon', function (Blueprint $table) {
            $table->id();
            //ForeignKey naar gezin en zorg dat het nullable kan zijn
            $table->foreignId('gezin_id')->nullable()->constrained('gezin');
            //voornaam
            $table->string('voornaam');
            //tussenvoegsel (nullable want niet iedereen heeft het)
            $table->string('tussenvoegsel')->nullable();
            //achternaam
            $table->string('achternaam');
            //geboortedatum
            $table->date('geboortedatum');
            //typepersoon
            $table->enum('typepersoon', ['klant', 'vrijwilliger', 'medewerker', 'manager']);
            //IsVertegenwoordiger
            $table->boolean('IsVertegenwoordiger');
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
