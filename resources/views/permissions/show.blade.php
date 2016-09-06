@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') Permission: {{ $permission->label }} @show</h3>

    <hr>

@endsection

@section('content')

    @include('admin::permissions.profile')

    @include('admin::permissions.users')

    @include('admin::permissions.roles')

    <div class="col-md-2 col-md-offset-5">
        @include('admin::partials.forms.delete', [
            'action' => route('admin.permissions.destroy', [$permission->getKey()]),
            'message' => 'Are you sure you want to delete this permission?',
        ])
    </div>

@endsection
