@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Liste des produits</h2>

<a href="{{ route('produits.create') }}" class="bg-red-700 text-white px-4 py-2 rounded">Ajouter produit</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="p-2">Nom</th>
            <th class="p-2">Catégorie</th>
            <th class="p-2">Unité</th>
            <th class="p-2">Prix</th>
            <th class="p-2">Stock</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produits as $produit)
        <tr class="border-b">
            <td class="p-2">{{ $produit->nom }}</td>
            <td class="p-2">{{ ucfirst($produit->categorie) }}</td>
            <td class="p-2">{{ ucfirst($produit->unite) }}</td>
            <td class="p-2">{{ $produit->prix }}</td>
            <td class="p-2">{{ $produit->stock }}</td>
            <td class="p-2 flex space-x-2">
                <a href="{{ route('produits.show', $produit->id) }}" class="text-green-600">Voir</a>
                <a href="{{ route('produits.edit', $produit->id) }}" class="text-blue-600">Modifier</a>
                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


