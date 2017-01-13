@extends('admin::layouts.app')

@section('title', "Editing User: {$user->name}")

@section('subtitle', "Updated: {$user->updated_at->diffForHumans()}")

@section('content')

    <form method="post" action="{{ route('admin.users.update', [$user->getKey()]) }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        @include('admin::users.form')

        <p class="control is-pulled-left">
            <a class="button" href="{{ route('admin.users.index') }}">
                Cancel
            </a>
        </p>

        <p class="control is-pulled-right">

            <button type="submit" class="button is-success">
                Save
            </button>

        </p>

        <div class="is-clearfix"></div>

    </form>

@endsection
