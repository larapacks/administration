@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') Role: {{ $role->label }} @show</h3>

    <hr>

@endsection

@section('content')

    @include('admin::roles.profile')

    @include('admin::roles.users')

    @include('admin::roles.permissions')

@endsection
