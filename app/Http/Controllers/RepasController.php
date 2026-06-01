<?php

namespace App\Http\Controllers;

use App\Models\Repas;
use Illuminate\Http\Request;

class RepasController extends Controller
{
    public function index()
    {
        $repas = Repas::all();
        return view('repas.index', compact('repas'));
    }

    public function create()
    {
        return view('repas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|in:entree,boisson,dessert,snack',
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'unite' => 'required|in:piece,sachet,bouteille,canette,plateau'
        ]);

        Repas::create($request->only(['categorie','nom','prix','unite']));

        return redirect()->route('repas.index')->with('success', 'Repas créé avec succès.');
    }

    public function show(Repas $repas)
    {
        return view('repas.show', compact('repas'));
    }

    public function edit(Repas $repas)
    {
        return view('repas.edit', compact('repas'));
    }

    public function update(Request $request, Repas $repas)
    {
        $request->validate([
            'categorie' => 'required|in:entree,boisson,dessert,snack',
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'unite' => 'required|in:piece,sachet,bouteille,canette,plateau'
        ]);

        $repas->update($request->only(['categorie','nom','prix','unite']));

        return redirect()->route('repas.index')->with('success', 'Repas mis à jour.');
    }

    public function destroy(Repas $repas)
    {
        $repas->delete();
        return redirect()->route('repas.index')->with('success', 'Repas supprimé.');
    }
}


