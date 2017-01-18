@extends('admin::layouts.auth')

@section('title', 'Login')

@section('content')

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
                    value="{{ old('email') }}"
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
                    type="password"
                    placeholder="●●●●●●●"
            >

            <span class="help is-danger">{{ $errors->first('password') }}</span>
        </p>

        <hr>

        <p class="control is-pulled-left">

            <button
                    type="button"
                    class="button is-default"
                    onclick="window.location.href = '{{ url('/') }}'">
                Cancel
            </button>

        </p>

        <p class="control is-pulled-right">
            <button id="login" class="button is-success">Login</button>
        </p>

        <div class="is-clearfix"></div>

    </form>

@endsection
