<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Setup | {{ config('admin.title', 'Administration') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.1/css/bulma.min.css">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        </style>

    </head>

    <body id="app">

        <section class="hero is-medium is-primary is-bold">

            <div class="hero-body">

                <div class="container">

                    <p class="title">
                        Administration
                    </p>

                    <p class="subtitle">
                        {{ trans('admin::layouts.setup') }}
                    </p>

                </div>

            </div>

        </section>

        <section class="section">

            <div class="container">
                @include('flash::message')
            </div>

            <div class="container">

                <div class="columns">

                    <div class="column is-half is-offset-one-quarter content">
                        @yield('content')
                    </div>

                    @yield('footer')

                </div>

            </div>

        </section>

    </body>

</html>
