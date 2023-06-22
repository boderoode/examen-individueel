<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'allergie_naam',
        'persoon_id',
        'gezin_id',
        'naam',
        'omschrijving',
        'Anafylactisch_risico',
        'IsActief',
        'Opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];
}
