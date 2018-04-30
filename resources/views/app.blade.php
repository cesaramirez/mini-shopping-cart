@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale()
];
@endphp
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body class="has-navbar-fixed-top">
        <div id="app"></div>

        <script> window.config = @json($config) </script>
        {{-- Load the application scripts --}}
        @if (app()->isLocal())
            <script src="{{ mix('js/app.js') }}"></script>
        @else
            <script src="{{ mix('js/manifest.js') }}"></script>
            <script src="{{ mix('js/vendor.js') }}"></script>
            <script src="{{ mix('js/app.js') }}"></script>
        @endif
    </body>
</html>
