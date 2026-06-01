@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Ajouter un vol</h2>

<form action="{{ route('vols.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold">Numéro vol</label>
        <input type="text" name="numero" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Date</label>
        <input type="date" name="date" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Heure</label>
        <input type="time" name="heure" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Passagers</label>
        <input type="number" name="passagers" class="border p-2 w-full" min="1" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Classe du vol</label>
        <select name="classe" class="border p-2 w-full" required>
            <option value="economique">Économique</option>
            <option value="business">Business</option>
            <option value="first class">First Class</option>
        </select>
    </div>

    <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Enregistrer</button>
</form>
@endsection



