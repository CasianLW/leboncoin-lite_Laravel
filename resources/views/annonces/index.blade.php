@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Annonces</h1>
                <a href="{{ route('annonces.create') }}" class="btn btn-primary mb-3">Créer une annonce</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Ville</th>
                            <th>Prix</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($annonces as $annonce)
                            <tr>
                                <td>{{ $annonce->title }}</td>
                                <td>{{ $annonce->email }}</td>
                                <td>{{ $annonce->name }}</td>
                                <td>{{ $annonce->description }}</td>
                                <td>{{ $annonce->location }}</td>
                                <td>{{ $annonce->price }}</td>
                                <td>{{ $annonce->status }}</td>
                                <td>
                                    <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-sm btn-primary">Voir</a>
                                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <!-- <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
                                    </form> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
