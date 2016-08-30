@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') Create Role @show</h3>

    <hr>

@endsection

@section('content')

    <form method="POST" action="{{ route('admin.roles.store') }}">

        {{ csrf_field() }}

        @include('admin::roles.form')

        <button type="submit" class="btn btn-primary">Create</button>

    </form>

@endsection
