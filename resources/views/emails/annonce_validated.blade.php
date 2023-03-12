    

 <br>
    <br>
    <br>
    <h1>Bonjour {{ $annonce->name }},</h1>

<h2>Votre annonce a bien été mise en ligne: "{{ $annonce->title }}".</h2>

<p>Pour mofifier l'annonce, cliquez sur le lien suivant:</p>
<a href="{{ route('annonces.edit', $annonce->id) }}">Modifier l'annonce</a>

<br>
<br>
<p>Pour supprimer l'annonce, cliquez sur le lien suivant:</p>
<a href="{{ route('annonces-delete.destroy', $annonce->token) }}">{{ route('annonces-delete.destroy', $annonce->token) }}</a>


<br>
<br>
Cordialement,
L'équipe {{ config('app.name') }}