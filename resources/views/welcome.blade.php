<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <section class="hero is-medium is-primary is-bold is-fullheight">
                <div class="hero-body">
                    <div class="container">
                    <h1 class="title">
                        Mini Shopping Cart
                    </h1>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
