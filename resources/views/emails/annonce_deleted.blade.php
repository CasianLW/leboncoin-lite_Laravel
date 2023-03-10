    
    <br>
    <br>
    <br>
    <h1>Bonjour {{ $annonce->name }},</h1>

<h2>Votre annonce a bien été supprimée: "{{ $annonce->title }}".</h2>

<p>Visitez les annonces de notre site via le lien suivant</p>
<a href="{{ route('annonces.index') }}">{{route('annonces.index')}}</a>


<br>
<br>
Cordialement,
L'équipe {{ config('app.name') }}