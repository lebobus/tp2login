@extends('layout')

@section('title', 'Show')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Ville</th>
        </tr>
    </thead>
    <tbody>
      <tr>
          <td>{{ $etudiant[0]->etudiant_nom }}</td>
          <td>{{ $etudiant[0]->etudiant_adresse }}</td>
          <td>{{ $etudiant[0]->etudiant_phone }}</td>
          <td>{{ $etudiant[0]->etudiant_email }}</td>
          <td>{{ $etudiant[0]->etudiant_dateNaissance }}</td>
          <td>{{ $etudiant[0]->ville_nom }}</td>
          <td><a href="/edit/{{ $etudiant[0]->id }}"><button class="btn btn-primary"><i class="fas fa-user-cog"></i></button></a></td>
      </tr>
  </tbody>
</table>
@endsection