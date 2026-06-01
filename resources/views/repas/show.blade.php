@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Détails du repas</h2>

<div class="bg-white p-6 shadow rounded space-y-3">
    <p><strong>Catégorie :</strong> {{ ucfirst($repas->categorie) }}</p>
    <p><strong>Nom :</strong> {{ $repas->nom }}</p>
    <p><strong>Prix :</strong> {{ $repas->prix }}</p>
    <p><strong>Unité :</strong> {{ ucfirst($repas->unite) }}</p>
</div>

<a href="{{ route('repas.index') }}" 
   class="mt-4 inline-block bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">
    Retour à la liste
</a>
@endsection


