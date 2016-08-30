@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') Edit Permission @show
    </h3>

    <hr>

@endsection

@section('content')

    <form method="POST" action="{{ route('admin.permissions.update', [$permission->getKey()]) }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        @include('admin::permissions.form')

        <div class="form-group">

            <button type="submit" class="btn btn-primary">
                Save
            </button>

        </div>

    </form>

@endsection
