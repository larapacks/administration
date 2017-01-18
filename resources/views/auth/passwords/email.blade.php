@extends('admin::layouts.auth')

@section('title', 'Forgot Password')

@section('content')

    <form
            class="form-horizontal"
            method="POST"
            action="{{ route('admin.auth.password.email') }}"
    >

        {{ csrf_field() }}

        <label class="label">E-Mail Address</label>

        <input
                type="email"
                class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                name="email"
                value="{{ old('email') }}"
                placeholder="jsmith@example.org"
                required
        >

        <span class="help is-danger">{{ $errors->first('email') }}</span>

        <hr>

        <p class="control is-pulled-left">

            <button
                    class="button is-default"
                    onclick="window.location.href = '{{ route('admin.auth.login') }}'">
                Cancel
            </button>

        </p>

        <p class="control is-pulled-right">
            <button type="submit" class="button is-success">
                Send Password Reset Link
            </button>
        </p>

        <div class="is-clearfix"></div>

    </form>

@endsection
