<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css"> 
</head>

<style>
    .hide {
    display: none;
}
</style>
<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Ajouter annonce</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
        @if ($errors->any())
    <div id="message-timeout" class="message-timeout alert alert-error" data-autohide>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div id="message-timeout" class="alert alert-success" data-autohide>
        {{ session('success') }}
    </div>
@endif
            @yield('content')
        </div>
    </main>



    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script defer>
    window.onload = () => {
        const messageTimeout = document.querySelector('#message-timeout[data-autohide]');
        if (messageTimeout) {
            console.log(messageTimeout);
            const duration = 3000;
            setTimeout(() => {
                messageTimeout.classList.add('hide');
            }, duration);
        }
    };
</script>
</body>
</html>