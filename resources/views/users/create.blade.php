@extends('admin::layouts.app')

@section('title', 'Create a User')

@section('content')

    <div class="column is-half is-offset-one-quarter">

        <form method="post" action="{{ route('admin.users.store') }}">

            {{ csrf_field() }}

            @include('admin::users.form')

            <p class="control is-pulled-left">
                <a class="button" href="{{ route('admin.users.index') }}">
                    Cancel
                </a>
            </p>

            <p class="control is-pulled-right">

                <button type="submit" class="button is-success">
                    Create
                </button>

            </p>

            <div class="is-clearfix"></div>

        </form>

    </div>

@endsection
