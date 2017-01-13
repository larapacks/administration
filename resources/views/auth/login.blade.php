<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('admin.title') }} | Login</title>

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
                                Login
                            </h1>

                            <div class="box">

                                <form
                                        action="{{ route('admin.auth.login') }}"
                                        method="POST"
                                        onsubmit="document.getElementById('login').className += ' is-loading'"
                                >

                                    {{ csrf_field() }}

                                    <label class="label">Email</label>

                                    <p class="control">
                                        <input
                                                name="email"
                                                class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                                type="text"
                                                placeholder="jsmith@example.org"
                                        >

                                        <span class="help is-danger">{{ $errors->first('email') }}</span>
                                    </p>

                                    <label class="label">Password</label>

                                    <p class="control">
                                        <input
                                                name="password"
                                                class="input {{ $errors->has('password') ? 'is-danger' : '' }}"
                                                type="password" placeholder="●●●●●●●"
                                        >

                                        <span class="help is-danger">{{ $errors->first('password') }}</span>
                                    </p>

                                    <hr>

                                    <p class="control is-pulled-left">
                                        <button class="button is-default" onclick="window.location.href = '/'">Cancel</button>
                                    </p>

                                    <p class="control is-pulled-right">
                                        <button id="login" class="button is-success">Login</button>
                                    </p>

                                    <div class="is-clearfix"></div>

                                </form>

                            </div>

                            <p class="has-text-centered">
                                <a href="#">Forgot password</a>
                                |
                                <a href="#">Need help?</a>
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </body>

</html>
