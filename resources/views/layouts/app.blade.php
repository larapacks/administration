<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('admin.title', 'Administration') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/administration/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css">

        <style>
            .table {
                font-size: 16px;
            }
        </style>

    </head>

    <body id="app">

        <nav class="nav has-shadow">

            <div class="container">

                <div class="nav-left">

                    <a class="nav-item title is-4">
                        {{ config('admin.title', 'Administration') }}
                    </a>

                </div>

                <div id="nav-menu" class="nav-menu nav-center">

                    @include('admin::layouts.partials.nav.center')

                </div>

                <span id="nav-toggle" class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>

                <div class="nav-menu nav-right">

                    @include('admin::layouts.partials.nav.right')

                </div>

            </div>

        </nav>

        @section('header')

            <section id="header" class="hero is-dark is-bold">

                <div class="hero-body">

                    <div class="container">

                        <h1 class="title">
                            @yield('title')
                        </h1>

                        <h2 class="subtitle">
                            @yield('subtitle')
                        </h2>

                    </div>

                </div>

            </section>

        @show

        <section id="content" class="section">

            <div class="container">

                @include('admin::layouts.partials.notifications')

                @yield('content')

            </div>

        </section>

        @section('footer')

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

        @show

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.2/js/standalone/selectize.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function ($) {

                var $toggle = $('#nav-toggle');
                var $menu = $('#nav-menu');

                $toggle.click(function() {
                    $(this).toggleClass('is-active');
                    $menu.toggleClass('is-active');
                });

                $('.modal-button').click(function() {
                    var target = $(this).data('target');
                    $('html').addClass('is-clipped');
                    $(target).addClass('is-active');
                });

                $('.modal-background, .modal-close').click(function() {
                    $('html').removeClass('is-clipped');
                    $(this).parent().removeClass('is-active');
                });

                $('.modal-card-head .delete, .modal-card-foot .button').click(function() {
                    $('html').removeClass('is-clipped');
                    $('.modal').removeClass('is-active');
                });

                // Add multi-select to selectize form inputs.
                $('.selectize').selectize();

                // Fade out alerts.
                $('div.notification').not('.is-warning, .is-danger').delay(3000).fadeOut(350);
            });
        </script>

        @yield('scripts')

    </body>

</html>
