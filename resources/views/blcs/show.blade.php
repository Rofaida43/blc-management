@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">BLC {{ $blc->numero_blc }}</h2>

<p><strong>Client :</strong> {{ $blc->client->nom }}</p>
<p><strong>Vol :</strong> {{ $blc->vol->numero }} ({{ $blc->vol->classe }})</p>
<p><strong>Date :</strong> {{ $blc->date }}</p>
<p><strong>Total :</strong> {{ $blc->total }} DA</p>

<h3 class="text-xl mt-4 mb-2">Repas</h3>
<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-red-700 text-white">
            <th class="p-2">Nom repas</th>
            <th class="p-2">Quantité</th>
            <th class="p-2">Prix unitaire</th>
            <th class="p-2">Total ligne</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blc->lignes as $ligne)
        <tr class="border-b">
            <td class="p-2">{{ $ligne->repas->nom }}</td>
            <td class="p-2">{{ $ligne->quantite }}</td>
            <td class="p-2">{{ $ligne->prix_unitaire }}</td>
            <td class="p-2">{{ $ligne->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

