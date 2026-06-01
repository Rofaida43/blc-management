@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Ajouter utilisateur</h2>

<form method="POST" action="{{ route('users.store') }}">
@csrf

<input name="name" placeholder="Nom" class="border p-2 w-full mb-2">
<input name="email" placeholder="Email" class="border p-2 w-full mb-2">
<input name="password" type="password" placeholder="Mot de passe" class="border p-2 w-full mb-2">

<button class="bg-blue-600 text-white px-4 py-2">
    Enregistrer
</button>

</form>
@endsection
