@extends('admin::layouts.app')

@section('title', "Permission: $permission->label")

@section('content')

    @include('admin::permissions.profile')

    @include('admin::permissions.users')

    @include('admin::permissions.roles')

@endsection
