@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Nouveau BLC</h2>

<form action="{{ route('blcs.store') }}" method="POST">
    @csrf

    <!-- Client -->
    <div class="mb-4">
        <label class="block mb-1">Client</label>
        <select name="client_id" class="border p-2 w-full" required>
            <option value="">-- Sélectionner un client --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }}</option>
            @endforeach
        </select>
    </div>

    <!-- Vol -->
    <div class="mb-4">
        <label class="block mb-1">Vol</label>
        <select name="vol_id" class="border p-2 w-full" required>
            <option value="">-- Sélectionner un vol --</option>
            @foreach($vols as $vol)
                <option value="{{ $vol->id }}">{{ $vol->numero }} - {{ $vol->classe }}</option>
            @endforeach
        </select>
    </div>

    <!-- Date -->
    <div class="mb-4">
        <label class="block mb-1">Date</label>
        <input type="date" name="date" class="border p-2 w-full" required>
    </div>

    <!-- Repas -->
    <div class="mb-4">
        <label class="block mb-1">Repas</label>
    @foreach($repas as $r)
    <div class="flex items-center mb-2">
        <input type="checkbox" name="repas[{{ $r->id }}][selected]" value="1" class="mr-2">

        <span class="mr-4">{{ $r->nom }} ({{ $r->prix }} DA)</span>

        <input type="number"
               name="repas[{{ $r->id }}][quantite]"
               placeholder="Quantité"
               min="1"
               class="border p-1 w-20">
    </div>
@endforeach

    </div>

    <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Créer BLC</button>
</form>
@endsection


