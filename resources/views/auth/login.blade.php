@extends('layout')

@section('content')
<h1 class="h1">Se connecter</h1>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-column mb-3 w-25">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
@endsection