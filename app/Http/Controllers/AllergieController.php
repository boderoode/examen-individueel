<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\SharedHelper;

class AllergieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $naam = $request->input('naam');

        //the tables of allergie persoon and allergie_per_persoon needs to join with gezin
        $query = DB::table('gezin')
            ->join('persoon', 'gezin.id', '=', 'persoon.gezin_id')
            ->join('allergie_per_persoon', 'persoon.id', '=', 'allergie_per_persoon.persoon_id')
            ->join('allergies', 'allergie_per_persoon.allergies_id', '=', 'allergies.id')
            ->select('gezin.id', 'allergies.allergie_naam', 'allergies.allergie_omschrijving', 'gezin.gezin_naam', 'gezin.gezin_omschrijving', 'persoon.voornaam', 'persoon.tussenvoegsel', 'persoon.achternaam', 'gezin.aantal_volwassenen', 'gezin.aantal_kinderen', 'gezin.aantal_babys', 'persoon.IsVertegenwoordiger');


        if ($naam) {
            $query->where('allergies.allergie_naam', $naam);
        }


        $allergie = $query->get();


        return view('allergeen.index', ['allergie' => $allergie]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $gezin = DB::table('gezin')
            ->join('persoon', 'gezin.id', '=', 'persoon.gezin_id')
            ->join('allergie_per_persoon', 'persoon.id', '=', 'allergie_per_persoon.persoon_id')
            ->join('allergies', 'allergie_per_persoon.allergies_id', '=', 'allergies.id')
            ->select('gezin.id', 'allergies.allergie_naam', 'allergies.allergie_omschrijving', 'gezin.gezin_naam', 'gezin.gezin_omschrijving', 'gezin.aantal_volwassenen', 'gezin.totaal_aantal_personen', 'gezin.aantal_kinderen', 'gezin.aantal_babys', 'persoon.IsVertegenwoordiger', 'persoon.voornaam', 'persoon.tussenvoegsel', 'persoon.achternaam', 'persoon.typepersoon')
            ->where('gezin.id', $id)
            ->get();


        return view('allergeen.show', ['gezin' => $gezin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $persoon = DB::table('persoon')
            ->join('allergie_per_persoon', 'persoon.id', '=', 'allergie_per_persoon.persoon_id')
            ->join('allergies', 'allergie_per_persoon.allergies_id', '=', 'allergies.id')
            ->select('persoon.id', 'allergies.allergie_naam', 'allergies.allergie_omschrijving', 'persoon.voornaam', 'persoon.tussenvoegsel', 'persoon.achternaam', 'persoon.typepersoon')
            ->where('persoon.id', $id)
            ->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allergie $allergie, $id)
    {
        dd($allergie);

        $allergie = Allergie::where('Id', $id)
            ->update([
                'allergie_naam'          => $request->input('allergie_naam'),
                'IsActief'         => $request->input('IsActief') === "on",
                'Opmerking'        => $request->input('Opmerking'),
                'datum_gewijzigd'  => $request->input('datum_gewijzigd'),

            ]);

        return redirect('allergeen' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allergie $allergie)
    {
        //
    }
}
