<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('admin.title') }} | @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.min.css">

    </head>

    <body>

        <section class="hero is-fullheight is-dark is-bold">

            <div class="hero-body">

                <div class="container">

                    <div class="columns">

                        <div class="column is-4 is-offset-4">

                            <h1 class="title has-text-centered">
                                @yield('title')
                            </h1>

                            <div class="box">

                                @yield('content')

                            </div>

                            <p class="has-text-centered">
                                @unless(\Larapacks\Administration\Menu::isActiveRoute('admin.auth.password.reset'))

                                    <a href="{{ route('admin.auth.password.reset') }}">Forgot password</a>

                                @endunless
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </body>

</html>
