@extends('admin::layouts.app')

@section('title', 'Create User')

@section('header')

    <h3>Create a User</h3>

@endsection

@section('content')

    {!! Form::open(['url' => route('admin.users.store')]) !!}

    @include('admin::users.form')

    {!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary']) !!}

    {!! Form::close() !!}

@endsection
