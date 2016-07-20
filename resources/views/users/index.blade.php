@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') All Users @show

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-circle"></i>
            Create
        </a>
    </h3>

    <div class="clearfix"></div>

    <hr>

@endsection

@section('content')

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Created</th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>

                        <td><a href="{{ route('admin.users.show', [$user->id]) }}">{{ $user->name }}</a></td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->created_at->diffForHumans() }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="text-center">{{ $users->links() }}</div>

@endsection
