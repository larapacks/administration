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

        {{-- Prevent user from deleting self. --}}
        @if (auth()->user()->id != $user->id)

            <div class="col-md-2 col-md-offset-5">
                @include('admin::layouts.partials.forms.delete', [
                    'action' => route('admin.users.destroy', [$user->id]),
                    'message' => 'Are you sure you want to delete this user?',
                ])
            </div>

        @endif

    </div>

@endsection
