@extends('admin::layouts.app')

@section('title', $user->name)

@section('subtitle', "Created {$user->created_at->diffForHumans()}")

@section('content')

    <div class="column is-4">
        @include('admin::users.profile')
    </div>

    <div class="column is-8">

        @include('admin::users.roles')

        @include('admin::users.permissions')

    </div>

@endsection
