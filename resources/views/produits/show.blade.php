@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Détails du produit</h2>

<div class="bg-white p-6 shadow rounded space-y-2">
    <p><strong>Nom :</strong> {{ $produit->nom }}</p>
    <p><strong>Catégorie :</strong> {{ ucfirst($produit->categorie) }}</p>
    <p><strong>Unité :</strong> {{ ucfirst($produit->unite) }}</p>
    <p><strong>Prix :</strong> {{ $produit->prix }}</p>
    <p><strong>Stock :</strong> {{ $produit->stock }}</p>
</div>

<a href="{{ route('produits.index') }}" class="mt-4 inline-block bg-red-700 text-white px-4 py-2 rounded">
    Retour à la liste
</a>
@endsection


