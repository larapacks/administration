@extends('admin::layouts.app')

@section('title', 'Edit Role')

@section('content')

    <form method="POST" action="{{ route('admin.roles.store') }}">

        {!! method_field('PATCH') !!}

        {!! csrf_field() !!}

        @include('admin::roles.form')

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
