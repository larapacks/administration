<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Setup | {{ config('admin.title', 'Administration') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.min.css">

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

        <footer class="footer">

            <div class="container">

                <div class="content has-text-centered">

                    <p>
                        <strong>Administration</strong> by <a href="https://github.com/larapacks">Larapacks</a>. The source code is licensed <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
                    </p>

                    <div id="social">
                        <iframe class="github-btn" src="https://ghbtns.com/github-btn.html?user=larapacks&repo=administration&type=star&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="105px" height="20px"></iframe>
                    </div>

                </div>

            </div>

        </footer>

    </body>

</html>
