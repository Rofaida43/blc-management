@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Gestion des utilisateurs</h2>

<a href="{{ route('users.create') }}" class="bg-red-700 text-white px-4 py-2 rounded">
    Ajouter un utilisateur
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <thead class="bg-red-700 text-white">
        <tr>
            <th class="p-2">Email</th>
            <th class="p-2">Password</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b">
            <td class="p-2">{{ $user->email }}</td>

            <td class="p-2">********</td>

            <td class="p-2">
                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600">Modifier</a>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


