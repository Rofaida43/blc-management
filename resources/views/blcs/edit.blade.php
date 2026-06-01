@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Éditer le BLC {{ $blc->numero_blc }}</h2>

    <form action="{{ route('blcs.update', $blc) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Même champs que create.blade.php, mais avec value="{{ old('champ', $blc->champ) }}" -->

        <!-- Exemple : -->
        <div class="mb-4">
            <label class="block mb-1 font-bold">Numéro BLC</label>
            <input type="text" name="numero_blc" value="{{ old('numero_blc', $blc->numero_blc) }}" class="w-full border px-3 py-2 rounded">
            @error('numero_blc') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Le reste idem avec client, vol, produits (cochés si déjà sélectionnés) -->

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-800">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
