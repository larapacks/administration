@extends('admin::layouts.setup')

@section('content')

    <h3 class="has-text-centered">
        Create an Administrator Account
    </h3>

    <form method="POST" action="{{ route('admin.setup.account.store') }}">

        {{ csrf_field() }}

        <label class="label">Name</label>

        <input
                name="name"
                type="text"
                value="{{ old('name') }}"
                class="input {{ $errors->has('name') ? 'is-danger' : null }}"
                placeholder="Enter the administrators name"
        >

        <p class="help is-danger">{{ $errors->first('name') }}</p>

        <label class="label">Email</label>

        <input
                name="email"
                type="email"
                value="{{ old('email') }}"
                class="input {{ $errors->has('email') ? 'is-danger' : null }}"
                placeholder="Enter the administrators email"
        >

        <p class="help is-danger">{{ $errors->first('email') }}</p>

        <label class="label">Password</label>

        <input
                name="password"
                type="password"
                class="input {{ $errors->has('password') ? 'is-danger' : null }}"
                placeholder="Enter the administrator password"
        >

        <p class="help is-danger">{{ $errors->first('password') }}</p>

        <label class="label">Confirm Password</label>

        <input
                name="password_confirmation"
                type="password"
                class="input {{ $errors->has('password_confirmation') ? 'is-danger' : null }}"
                placeholder="Confirm administrator password"
        >

        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>

        <div class="has-text-centered">

            <button type="submit" class="button is-primary is-large">

                <span class="icon">
                    <i class="fa fa-check-circle-o"></i>
                </span>

                <span>Complete Setup</span>

            </button>

        </div>

    </form>

@endsection
