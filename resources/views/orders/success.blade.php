<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Successo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <style>
        img {
            width: 300px;
        }
        .text-purple {
            color: #7B2CBF;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="p-5">
            <div class="container text-center">
                <img src="{{ Vite::asset('public/logo-deliveboo.png') }}" alt="Logo">
                <h1>
                    Pagamento effettuato con successo!
                </h1>
                <p>
                    A breve verrai reindirizzato alla home
                </p>
                <div class="spinner-border text-purple" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
            </div>
        </main>
    </div>
    <script>
        setTimeout(() => {
            window.location.replace("http://localhost:5174");
        }, 3000);
    </script>
</body>
</html>