    
    <br>
    <br>
    <br>
    <h1>Bonjour {{ $annonce->name }},</h1>

<h2>Nous avons bien enregistré votre annonce "{{ $annonce->title }}".</h2>

<p>Pour valider la mise en ligne de l'annonce, veuillez cliquer sur le lien suivant:</p>
<a href="{{ route('validate.annonce', $annonce->token) }}">{{ route('validate.annonce', $annonce->token) }}</a>
<br>
<br>
Cordialement,
L'équipe {{ config('app.name') }}