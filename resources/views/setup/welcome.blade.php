@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-12 text-center">

        <i class="fa fa-5x fa-cogs text-muted"></i>

        <br>

        <h3>
            Welcome to the Administration setup.
        </h3>

        <br>

        <p>
            <a class="btn btn-lg btn-primary" href="{{ route('admin.setup.migrations.create') }}">
                Begin Setup
            </a>
        </p>

    </div>

@endsection
