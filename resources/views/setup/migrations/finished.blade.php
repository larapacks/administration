@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        <a
                href="{{ route('admin.setup.account.create') }}"
                class="btn btn-lg btn-primary btn-block"
        >
            <i class="fa fa-user-md"></i>
            Create an Administrator Account
        </a>

    </div>

@endsection
