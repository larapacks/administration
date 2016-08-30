@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        <h3 class="text-center text-muted">
            Setup Database Tables
        </h3>

        <hr>

        <form method="POST" action="{{ route('admin.setup.migrations.store') }}">

            {{ csrf_field() }}

            <button type="submit" class="btn btn-lg btn-primary btn-block">

                <i class="fa fa-cogs"></i>

                Begin

            </button>

        </form>

    </div>

@endsection
