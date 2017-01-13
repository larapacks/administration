@extends('admin::layouts.app')

@section('title', trans('admin::dashboard.welcome'))

@section('content')

    <nav class="level is-mobile">
        @if(auth()->user()->can('admin.users'))
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Users</p>
                    <p class="title">{{ $users }}</p>
                </div>
            </div>
        @endif

        @if(auth()->user()->can('admin.roles'))
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Roles</p>
                    <p class="title">{{ $roles }}</p>
                </div>
            </div>
        @endif

        @if(auth()->user()->can('admin.permissions'))
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Permissions</p>
                    <p class="title">{{ $permissions }}</p>
                </div>
            </div>
        @endif

    </nav>

@endsection
