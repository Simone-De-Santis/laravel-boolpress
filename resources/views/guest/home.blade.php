<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <title>Laravel</title>
</head>

<body>
  {{-- useremo vue per la gestione della pagina a livello di user --}}
  <div id="root">


  </div>
  {{-- cambiare lo script con il front.js --}}
  <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
