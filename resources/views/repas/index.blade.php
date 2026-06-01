@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Liste des repas</h2>

<a href="{{ route('repas.create') }}" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">
    Ajouter un repas
</a>

@if(session('success'))
    <p class="text-green-600 mt-2">{{ session('success') }}</p>
@endif

<table class="w-full mt-4 bg-white shadow rounded">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="p-2">Catégorie</th>
            <th class="p-2">Nom</th>
            <th class="p-2">Prix</th>
            <th class="p-2">Unité</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($repas as $r)
        <tr class="border-b">
            <td class="p-2">{{ ucfirst($r->categorie) }}</td>
            <td class="p-2">{{ $r->nom }}</td>
            <td class="p-2">{{ $r->prix }}</td>
            <td class="p-2">{{ ucfirst($r->unite) }}</td>
            <td class="p-2 flex space-x-2">
                <a href="{{ route('repas.show', $r->id) }}" class="text-green-600">Voir</a>
                <a href="{{ route('repas.edit', $r->id) }}" class="text-blue-600">Modifier</a>
                <form action="{{ route('repas.destroy', $r->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-2 text-center">Aucun repas enregistré.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection


