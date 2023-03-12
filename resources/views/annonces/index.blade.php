@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Annonces</h1>
                
                <!-- <table class="table">
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
                                     <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> -->
                
<div class="annonces-list">
    
                    @foreach($annonces as $annonce)
                    <div class="annonce-card">
                        <div class="card-img"><img src="https://images.unsplash.com/photo-1534190239940-9ba8944ea261?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" alt=""></div>
                        <a class="card-infos" href="{{ route('annonces.show', $annonce->id) }}">
                            <div class="infos-details"><h2>{{ $annonce->title }}</h2>
                            <p>{{ substr($annonce->description, 0, 100) . (strlen($annonce->description) > 100 ? '...' : '') }}</p></div>
                            <div class="infos-vendeur"><h3>{{ $annonce->name }} <span class="email-vendeur">({{ $annonce->email }})</span></h3>
                            <h4>{{ $annonce->location }}</h4> <br> <p class="price">{{ $annonce->price }} €</p></div>
                            <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-sm btn-primary">Voir</a>
                        </a>
                    </div>
                    @endforeach
</div>

            </div>
        </div>
    </div>
@endsection
