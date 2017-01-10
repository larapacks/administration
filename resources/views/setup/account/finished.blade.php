@extends('admin::layouts.setup')

@section('content')

    <div class="has-text-centered">

        <h1>Successfully created administrator.</h1>

        <hr>

        <a class="button is-large is-primary" href="{{ route('admin.auth.login') }}">
            <span class="icon">
                <i class="fa fa-sign-in"></i>
            </span>

            <span>Login</span>
        </a>

    </div>

@endsection
