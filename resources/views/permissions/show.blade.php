@extends('admin::layouts.app')

@section('title', $permission->label)

@section('content')

    @include('admin::permissions.profile')

    @include('admin::permissions.users')

    @include('admin::permissions.roles')

@endsection
