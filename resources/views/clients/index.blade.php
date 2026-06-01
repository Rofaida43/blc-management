@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4 text-red-700">Liste des clients</h2>

<a href="{{ route('clients.create') }}" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 mb-4 inline-block">
    Nouveau client
</a>

<table class="w-full border border-red-700">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="p-2 border">Nom</th>
            <th class="p-2 border">Adresse</th>
            <th class="p-2 border">Téléphone</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Type client</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr class="hover:bg-red-100">
            <td class="p-2 border">{{ $client->nom }}</td>
            <td class="p-2 border">{{ $client->adresse }}</td>
            <td class="p-2 border">{{ $client->telephone }}</td>
            <td class="p-2 border">{{ $client->email }}</td>
            <td class="p-2 border">{{ $client->type_client }}</td>
            <td class="p-2 border flex space-x-2">
                <a href="{{ route('clients.edit', $client->id) }}" class="text-red-700 hover:underline">Modifier</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-700 hover:underline">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

