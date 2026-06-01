@extends('layouts.app')

@section('content')
<h2>Connexion</h2>

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ url('login') }}">
    @csrf

    <div class="mb-3">
        <label>Email :</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mot de passe :</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
@endsection


