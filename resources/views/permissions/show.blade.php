@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') Permission: {{ $permission->label }} @show</h3>

    <hr>

@endsection

@section('content')

    @include('admin::permissions.profile')

    @include('admin::permissions.users')

    @include('admin::permissions.roles')

@endsection
