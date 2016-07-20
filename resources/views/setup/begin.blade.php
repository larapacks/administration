@extends('admin::layouts.app')

@section('title', 'Setup Administration')

@section('content')


    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        <h3 class="text-center text-muted">
            Create an Administrator Account
        </h3>

        {!!
            Form::open([
                'url' => route('admin.setup.finish'),
            ])
        !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

            {!!
                Form::text('name', null, [
                    'placeholder' => 'Enter the Administrators name',
                    'class' => 'form-control',
                ])
            !!}

            <p class="help-block">{{ $errors->first('name') }}</p>

        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">

            {!!
                Form::text('email', null, [
                    'placeholder' => 'Enter the Administrators email',
                    'class' => 'form-control',
                ])
            !!}

            <p class="help-block">{{ $errors->first('email') }}</p>

        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">

            {!!
                Form::password('password', [
                    'placeholder' => 'Enter Administrator Password',
                    'class' => 'form-control',
                ])
            !!}

            <p class="help-block">{{ $errors->first('password') }}</p>

        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : null }}">

            {!!
                Form::password('password_confirmation', [
                    'placeholder' => 'Confirm Administrator Password',
                    'class' => 'form-control',
                ])
            !!}

            <p class="help-block">{{ $errors->first('password_confirmation') }}</p>

        </div>

        <div class="form-group text-center">

            {!! Form::submit('Complete Setup', ['class' => 'btn btn-lg btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection
