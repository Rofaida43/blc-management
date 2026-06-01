@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4 text-red-700">Modifier client</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-4 bg-white p-4 rounded shadow">
    @csrf
    @method('PUT')
    <div>
        <label class="block font-semibold">Nom</label>
        <input type="text" name="nom" value="{{ old('nom', $client->nom) }}" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-semibold">Adresse</label>
        <input type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-semibold">Téléphone</label>
        <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-semibold">Email</label>
        <input type="email" name="email" value="{{ old('email', $client->email) }}" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-semibold">Type client</label>
        <select name="type_client" class="w-full border p-2 rounded">
            <option value="Particulier" {{ old('type_client', $client->type_client) == 'Particulier' ? 'selected' : '' }}>Particulier</option>
            <option value="Entreprise" {{ old('type_client', $client->type_client) == 'Entreprise' ? 'selected' : '' }}>Entreprise</option>
            <option value="Distributeur" {{ old('type_client', $client->type_client) == 'Distributeur' ? 'selected' : '' }}>Distributeur</option>
            <option value="VIP" {{ old('type_client', $client->type_client) == 'VIP' ? 'selected' : '' }}>VIP</option>
            <option value="Autre" {{ old('type_client', $client->type_client) == 'Autre' ? 'selected' : '' }}>Autre</option>
        </select>
    </div>
    <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Mettre à jour</button>
</form>
@endsection


