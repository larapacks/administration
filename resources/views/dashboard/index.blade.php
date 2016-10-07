@extends('admin::layouts.app')

@section('title', 'Welcome')

@section('content')

    <div class="text-white text-center">

        <h1 class="hidden-xs">
            {{ trans('admin::dashboard.welcome') }}
        </h1>

        <h3 class="visible-xs">
            {{ trans('admin::dashboard.welcome') }}
        </h3>

        <hr>

    </div>

    @if(Auth::user()->can('admin.users'))

        <div class="col-md-4">

            <div class="panel panel-info">

                <div class="panel-body">

                    <i class="fa fa-5x fa-users pull-left"></i>

                    <div class="pull-left">
                        <h3>
                            {{ trans('admin::dashboard.users') }}:

                            <span class="h2">
                                {{ $users }}
                            </span>
                        </h3>

                        <a class="btn btn-xs btn-default" href="{{ route('admin.users.index') }}">
                            {{ trans('admin::dashboard.view') }}
                        </a>
                    </div>

                </div>

            </div>

        </div>

    @endif

    @if(Auth::user()->can('admin.roles'))

        <div class="col-md-4">

            <div class="panel panel-info">

                <div class="panel-body">

                    <i class="fa fa-5x fa-user-md pull-left"></i>

                    <div class="pull-left">
                        <h3>
                            {{ trans('admin::dashboard.roles') }}:

                            <span class="h2">
                                {{ $roles }}
                            </span>
                        </h3>

                        <a class="btn btn-xs btn-default" href="{{ route('admin.roles.index') }}">
                            {{ trans('admin::dashboard.view') }}
                        </a>
                    </div>

                </div>

            </div>

        </div>

    @endif

    @if(Auth::user()->can('admin.permissions'))

        <div class="col-md-4">

            <div class="panel panel-info">

                <div class="panel-body">

                    <i class="fa fa-5x fa-check-circle-o pull-left"></i>

                    <div class="pull-left">
                        <h3>
                            {{ trans('admin::dashboard.permissions') }}:

                            <span class="h2">
                                {{ $permissions }}
                            </span>
                        </h3>

                        <a class="btn btn-xs btn-default" href="{{ route('admin.permissions.index') }}">
                            {{ trans('admin::dashboard.view') }}
                        </a>
                    </div>

                </div>

            </div>

        </div>

    @endif

@endsection
