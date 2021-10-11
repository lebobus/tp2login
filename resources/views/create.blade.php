@extends('layout')

@section('title', 'Create')

@section('content')

    <h1 class="h1">Lister un étudiant</h1>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-column mb-3 w-25">
            <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
            <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" required>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Téléphone" required>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            <input type="date" name="naissance" class="form-control" id="naissance" required>

            <select name="ville" class="form-select">
            @foreach ($villes as $ville)
                <option value="{{$ville->id}}">{{$ville->ville_nom}}</option>
            @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Lister</button>
        </div>
    </form>

@endsection
