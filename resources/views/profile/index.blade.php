@extends('layout')

@section('title', 'Edit')

@section('content')

    <h1 class="h1 mb-3">Modifier son profil ({{ $etudiant[0]->etudiant_nom }})</h1>

    <form class="d-flex gap-3" method="POST">
        @method('POST')
        @csrf

        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="nom" />
            <span class="d-flex align-items-center">Nom: </span><input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" value="{{ $etudiant[0]->etudiant_nom }}" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="adresse" />
            <span class="d-flex align-items-center">Adresse: </span><input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" value="{{ $etudiant[0]->etudiant_adresse }}" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="phone" />
            <span class="d-flex align-items-center">Téléphone: </span><input type="text" name="phone" class="form-control" id="phone" placeholder="Téléphone" value="{{ $etudiant[0]->etudiant_phone }}" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="email" />
            <span class="d-flex align-items-center">Email: </span><input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $etudiant[0]->etudiant_email }}" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="naissance" />
            <span class="d-flex align-items-center">Date de naissance: </span><input type="date" name="naissance" class="form-control" id="naissance" value="{{ $etudiant[0]->etudiant_dateNaissance }}" required>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <form method="POST">
        @method('POST')
        @csrf
        <div class="d-flex gap-3 flex-row mb-3 w-50">
            <input type="hidden" name="id" value="{{ $etudiant[0]->id }}" />
            <input type="hidden" name="action" value="delete" />
            <button type="submit" class="btn btn-danger">Supprimer cet étudiant</button>
        </div>
    </form>


@endsection
