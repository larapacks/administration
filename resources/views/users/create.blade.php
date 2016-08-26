@extends('admin::layouts.app')

@section('title', 'Create User')

@section('header')

    <h3>Create a User</h3>

@endsection

@section('content')

    <form method="post" action="{{ route('admin.users.store') }}">

        {!! csrf_field() !!}

        @include('admin::users.form')

        <button type="submit" class="btn btn-primary">
            Create
        </button>

    </form>

@endsection
