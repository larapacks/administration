@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') User: {{ $user->name }} @show</h3>

    <hr>

@endsection

@section('content')

    @include('admin::users.profile')

    @include('admin::users.roles')

    @include('admin::users.permissions')

@endsection
