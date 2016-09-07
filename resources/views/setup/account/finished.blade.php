@extends('admin::layouts.setup')

@section('content')

    <div class="col-md-12 text-center">

        <i class="fa fa-check-circle-o fa-5x text-muted"></i>

        <br>

        <p class="h4">
            You've successfully created an administrator. You can now <a href="{{ route('admin.auth.login') }}">login</a>.
        </p>

    </div>

@endsection
