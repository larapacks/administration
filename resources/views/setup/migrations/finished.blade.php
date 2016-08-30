@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        <h3 class="text-center text-muted">
            Completed Migrations
        </h3>

        <hr>

        <a
                href="{{ route('admin.setup.account.create') }}"
                class="btn btn-lg btn-primary btn-block"
        >
            <i class="fa fa-user-md"></i>
            Create an Administrator Account
        </a>

    </div>

@endsection
