<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use App\Models\Repas;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::with('repas')->get();
        return view('vols.index', compact('vols'));
    }

    public function create()
    {
        $repas = Repas::all();
        return view('vols.create', compact('repas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:vols',
            'date' => 'required|date',
            'heure' => 'required',
            'passagers' => 'required|integer',
            'classe' => 'required|in:economique,buisness,first class',
        ]);

        $vol = Vol::create($request->only(['numero','date','heure','passagers','classe']));

        if($request->has('repas_ids')){
            $vol->repas()->sync($request->repas_ids);
        }

        return redirect()->route('vols.index')->with('success', 'Vol créé avec succès.');
    }

    public function edit(Vol $vol)
    {
        $repas = Repas::all();
        return view('vols.edit', compact('vol','repas'));
    }

    public function update(Request $request, Vol $vol)
    {
        $request->validate([
            'numero' => 'required|unique:vols,numero,'.$vol->id,
            'date' => 'required|date',
            'heure' => 'required',
            'passagers' => 'required|integer',
            'classe' => 'required|in:economique,buisness,first class',
        ]);

        $vol->update($request->only(['numero','date','heure','passagers','classe']));
        $vol->repas()->sync($request->repas_ids ?? []);

        return redirect()->route('vols.index')->with('success', 'Vol modifié avec succès.');
    }

    public function show(Vol $vol)
    {
        $vol->load('repas');
        return view('vols.show', compact('vol'));
    }

    public function destroy(Vol $vol)
    {
        $vol->delete();
        return redirect()->route('vols.index')->with('success', 'Vol supprimé avec succès.');
    }
}



