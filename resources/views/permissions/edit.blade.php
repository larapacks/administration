@extends('admin::layouts.app')

@section('title', 'Edit Permission')

@section('content')

    <form method="POST" action="{{ route('admin.permissions.update', [$permission->getKey()]) }}">

        {!! method_field('PATCH') !!}

        {!! csrf_field() !!}

        @include('admin::permissions.form')

        <div class="form-group">

            <button type="submit" class="btn btn-primary">
                Save
            </button>

        </div>

    </form>

@endsection
