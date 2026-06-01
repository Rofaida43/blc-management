@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Modifier le vol</h2>

<form action="{{ route('vols.update', $vol->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold">Numéro vol</label>
        <input type="text" name="numero" value="{{ $vol->numero }}" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Date</label>
        <input type="date" name="date" value="{{ $vol->date }}" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Heure</label>
        <input type="time" name="heure" value="{{ $vol->heure }}" class="border p-2 w-full" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Passagers</label>
        <input type="number" name="passagers" value="{{ $vol->passagers }}" class="border p-2 w-full" min="1" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Classe du vol</label>
        <select name="classe" class="border p-2 w-full" required>
            <option value="economique" {{ $vol->classe=='economique'?'selected':'' }}>Économique</option>
            <option value="business" {{ $vol->classe=='business'?'selected':'' }}>Business</option>
            <option value="first class" {{ $vol->classe=='first class'?'selected':'' }}>First Class</option>
        </select>
    </div>

    <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Modifier</button>
</form>
@endsection



