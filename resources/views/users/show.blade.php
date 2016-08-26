@extends('admin::layouts.app')

@section('title', "User: $user->name")

@section('content')

    @include('admin::users.profile')

    @include('admin::users.roles')

    @include('admin::users.permissions')

@endsection
