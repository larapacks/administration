@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') User: {{ $user->name }} @show</h3>

    <hr>

@endsection

@section('content')

    @include('admin::users.profile')

    @include('admin::users.roles')

    @include('admin::users.permissions')

    {{-- Prevent user from deleting self. --}}
    @if (auth()->user()->id != $user->id)

        <div class="col-md-2 col-md-offset-5">
            @include('admin::partials.forms.delete', [
                'action' => route('admin.users.destroy', [$user->id]),
                'message' => 'Are you sure you want to delete this user?',
            ])
        </div>

    @endif

@endsection
