@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Détails utilisateur</h2>

<p><b>Nom :</b> {{ $user->name }}</p>
<p><b>Email :</b> {{ $user->email }}</p>

<a href="{{ route('users.index') }}" class="text-blue-600">
    Retour
</a>

@endsection

