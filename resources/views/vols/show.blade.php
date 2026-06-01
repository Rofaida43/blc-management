@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Détails du vol</h2>

<div class="bg-white p-6 shadow rounded space-y-2">
    <p><strong>Numéro :</strong> {{ $vol->numero }}</p>
    <p><strong>Date :</strong> {{ $vol->date }}</p>
    <p><strong>Heure :</strong> {{ $vol->heure }}</p>
    <p><strong>Classe :</strong> {{ ucfirst($vol->classe) }}</p>
    <p><strong>Passagers :</strong> {{ $vol->passagers }}</p>

    <p><strong>Repas disponibles :</strong></p>
    <ul class="list-disc ml-6">
        @foreach($vol->repas as $r)
            <li>{{ $r->nom }} ({{ ucfirst($r->categorie) }})</li>
        @endforeach
    </ul>
</div>

<a href="{{ route('vols.index') }}" class="mt-4 inline-block bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">
    Retour à la liste
</a>
@endsection




