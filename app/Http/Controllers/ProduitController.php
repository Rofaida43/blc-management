<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    // Liste des produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    // Formulaire création
    public function create()
    {
        return view('produits.create');
    }

    // Enregistrer nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|in:entree,boisson,dessert,snacks',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'unite' => 'required|in:piece,sachet,bouteille,canette,plateau'
        ]);

        Produit::create($request->only(['nom', 'categorie', 'prix', 'stock', 'unite']));

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    // Formulaire édition
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    // Mettre à jour produit
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|in:entree,boisson,dessert,snacks',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'unite' => 'required|in:piece,sachet,bouteille,canette,plateau'
        ]);

        $produit->update($request->only(['nom', 'categorie', 'prix', 'stock', 'unite']));

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');
    }
public function show(Produit $produit)
{
    // Affiche les détails d’un produit
    return view('produits.show', compact('produit'));
}

    // Supprimer produit
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }
}


