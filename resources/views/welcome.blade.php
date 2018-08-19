<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>Trip Builder</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}" />
</head>
<body>
    <div id="app">
    </div>

    <!-- JS -->
    <script src="{{ URL::to('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('js/popper.min.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('js/main.js') }}"></script>
    <script src="{{ URL::to('js/app.js') }}"></script>
</body>
</html>
