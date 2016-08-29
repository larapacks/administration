@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') Edit User @show
    </h3>

    <hr>

@endsection

@section('content')

    <form method="post" action="{{ route('admin.users.update', [$user->getKey()]) }}">

        {!! method_field('patch') !!}

        {!! csrf_field() !!}

        @include('admin::users.form')

        <button type="submit" class="btn btn-primary">
            Save
        </button>

    </form>

@endsection
