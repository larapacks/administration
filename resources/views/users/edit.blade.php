@extends('admin::layouts.app')

@section('title', 'Edit User')

@section('header')

    <h3>Edit User</h3>

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
