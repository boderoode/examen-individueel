<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use Illuminate\Http\Request;

class AllergieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $naam = $request->input('naam');

        $query = Allergie::join('allergie_per_persoon', 'allergies.id', '=', 'allergie_per_persoon.allergies_id')
            ->join('persoon', 'allergie_per_persoon.persoon_id', '=', 'persoon.id')
            ->join('gezin', 'persoon.gezin_id', '=', 'gezin.id')
            ->select('allergies.allergie_naam', 'allergies.allergie_omschrijving', 'gezin.gezin_naam', 'gezin.aantal_volwassenen', 'gezin.aantal_kinderen', 'gezin.aantal_babys', 'persoon.IsVertegenwoordiger');

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
    public function show(Allergie $allergie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allergie $allergie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allergie $allergie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allergie $allergie)
    {
        //
    }
}
