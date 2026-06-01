@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Modifier utilisateur</h2>

<form method="POST" action="{{ route('users.update',$user) }}">
@csrf
@method('PUT')

<input name="name" value="{{ $user->name }}" class="border p-2 w-full mb-2">
<input name="email" value="{{ $user->email }}" class="border p-2 w-full mb-2">

<button class="bg-yellow-600 text-white px-4 py-2">
    Modifier
</button>

</form>
@endsection

