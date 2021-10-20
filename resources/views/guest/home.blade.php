<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <title>Laravel</title>
</head>

<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
      <div class="top-right links">
        {{-- auth = se sei loggaro'autorizzato' mostra qusto else.. esiste il controllo contrario con @guest 'sei un ospite no n loggato' --}}
        @auth
          <a href="{{ url('/home') }}">Home guest</a>
          <a href="{{ url('/admin/posts') }}">Home Admin</a>
        @else
          <a href="{{ route('login') }}">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      </div>
    @endif
  </div>
  {{-- useremo vue per la gestione della pagina a livello di user --}}

  <div id="root">



  </div>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
