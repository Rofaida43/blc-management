@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Liste des vols</h2>

<a href="{{ route('vols.create') }}" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">
    Ajouter un vol
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="p-2">Numéro</th>
            <th class="p-2">Date</th>
            <th class="p-2">Heure</th>
            <th class="p-2">Classe</th>
            <th class="p-2">Passagers</th>
            <th class="p-2">Repas disponibles</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($vols as $v)
        <tr class="border-b">
            <td class="p-2">{{ $v->numero }}</td>
            <td class="p-2">{{ $v->date }}</td>
            <td class="p-2">{{ $v->heure }}</td>
            <td class="p-2">{{ ucfirst($v->classe) }}</td>
            <td class="p-2">{{ $v->passagers }}</td>
            <td class="p-2">
                @foreach($v->repas as $r)
                    <span class="inline-block bg-gray-200 px-2 py-1 rounded text-sm mr-1">{{ $r->nom }}</span>
                @endforeach
            </td>
            <td class="p-2 flex space-x-2">
                <a href="{{ route('vols.show', $v->id) }}" class="text-green-600">Voir</a>
                <a href="{{ route('vols.edit', $v->id) }}" class="text-blue-600">Modifier</a>
                <form action="{{ route('vols.destroy', $v->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="p-2 text-center">Aucun vol enregistré.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection




