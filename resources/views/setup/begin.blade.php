@extends('admin::layouts.setup')

@section('header')

    <h3 class="text-center">@section('title') Setup @show</h3>

    <hr>

@endsection

@section('content')


    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        <h3 class="text-center text-muted">
            Create an Administrator Account
        </h3>

        <hr>

        <form method="POST" action="{{ route('admin.setup.finish') }}">

            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

                <label class="help-block">Name</label>

                <input name="name" type="text" class="form-control" placeholder="Enter the administrators name">

                <p class="help-block">{{ $errors->first('name') }}</p>

            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">

                <label class="help-block">Email</label>

                <input name="email" type="email" class="form-control" placeholder="Enter the administrators email">

                <p class="help-block">{{ $errors->first('email') }}</p>

            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">

                <label class="help-block">Password</label>

                <input name="password" type="password" class="form-control" placeholder="Enter the administrator password">

                <p class="help-block">{{ $errors->first('password') }}</p>

            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : null }}">

                <label class="help-block">Confirm Password</label>

                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm administrator password">

                <p class="help-block">{{ $errors->first('password_confirmation') }}</p>

            </div>

            <div class="form-group text-center">

                <button type="submit" class="btn btn-primary">

                    <i class="fa fa-check-circle-o"></i>

                    Complete Setup

                </button>

            </div>

        </form>

    </div>

@endsection
