@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Liste des BLC</h2>

<a href="{{ route('blcs.create') }}" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 mb-4 inline-block">Nouveau BLC</a>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-red-700 text-white">
            <th class="p-2">Numéro BLC</th>
            <th class="p-2">Client</th>
            <th class="p-2">Vol</th>
            <th class="p-2">Classe</th>
            <th class="p-2">Date</th>
            <th class="p-2">Total</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blcs as $blc)
        <tr class="border-b">
            <td class="p-2">{{ $blc->numero_blc }}</td>
            <td class="p-2">{{ $blc->client->nom }}</td>
            <td class="p-2">{{ $blc->vol->numero }}</td>
            <td class="p-2">{{ $blc->vol->classe }}</td>
            <td class="p-2">{{ $blc->date }}</td>
            <td class="p-2">{{ $blc->total }}</td>
            <td class="p-2 space-x-2">
                <a href="{{ route('blcs.show', $blc) }}" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">Voir</a>
                <a href="{{ route('blcs.edit', $blc) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Modifier</a>
                <form action="{{ route('blcs.destroy', $blc) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700" onclick="return confirm('Supprimer ce BLC ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

