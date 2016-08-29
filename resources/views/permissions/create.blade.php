@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') Create Permission @show
    </h3>

    <hr>

@endsection

@section('content')

    <form method="POST" action="{{ route('admin.permissions.store') }}">

        {!! csrf_field() !!}

        @include('admin::permissions.form')

        <div class="form-group">

            <button type="submit" class="btn btn-primary">Create</button>

        </div>

    </form>

@endsection
