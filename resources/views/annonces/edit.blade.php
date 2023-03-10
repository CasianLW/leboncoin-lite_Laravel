@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Modifier une annonce</h1>
<form action="{{ route('annonces.update', $annonce->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
<label for="title">Titre</label>
<input type="text" name="title" id="title" class="form-control" value="{{ $annonce->title }}">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" value="{{ $annonce->email }}">
</div>
<div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $annonce->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $annonce->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Ville</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ $annonce->location }}">
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $annonce->price }}">
                </div>
                <div class="form-group">
                    <label for="token">Token</label>
                    <input type="text" name="token" id="token" class="form-control" value="{{ $annonce->token }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="number" name="status" id="status" class="form-control" value="{{ $annonce->status }}">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection

