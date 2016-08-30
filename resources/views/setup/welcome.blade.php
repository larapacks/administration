@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-12 text-center">

        <h3>
            Welcome to the Administration setup process.
        </h3>

        <br>

        <p>
            <a class="btn btn-primary" href="{{ route('admin.setup.migrations.create') }}">
                <i class="fa fa-cog"></i>
                Begin Setup
            </a>
        </p>

    </div>

@endsection
