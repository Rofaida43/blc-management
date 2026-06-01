@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Détail du client {{ $client->nom }}</h2>

    <p><strong>Adresse :</strong> {{ $client->adresse }}</p>
    <p><strong>Téléphone :</strong> {{ $client->telephone }}</p>
    <p><strong>Email :</strong> {{ $client->email ?? '-' }}</p>
    <p><strong>Type client :</strong> {{ $client->type_client }}</p>

    <a href="{{ route('clients.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Retour</a>
</div>
@endsection
