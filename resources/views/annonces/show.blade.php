@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>{{ $annonce->title }}</h1>
<p><strong>Email:</strong> {{ $annonce->email }}</p>
<p><strong>Nom:</strong> {{ $annonce->name }}</p>
<p><strong>Description:</strong> {{ $annonce->description }}</p>
<p><strong>Ville:</strong> {{ $annonce->location }}</p>
<p><strong>Prix:</strong> {{ $annonce->price }}</p>
<p><strong>Token:</strong> {{ $annonce->token }}</p>
<p><strong>Status:</strong> {{ $annonce->status }}</p>
<!-- <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-warning">Modifier</a>
<form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="d-inline-block">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button> -->
</form>
</div>
</div>
</div>
@endsection