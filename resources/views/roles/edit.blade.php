@extends('admin::layouts.app')

@section('header')

    <h3>@section('title') Edit Role @show</h3>

    <hr>

@endsection

@section('content')

    <form method="POST" action="{{ route('admin.roles.update', [$role->getKey()]) }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        @include('admin::roles.form')

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
