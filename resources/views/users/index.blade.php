@extends('admin::layouts.app')

@section('title', trans('admin::dashboard.users'))

@section('content')

    <nav class="level">

        <!-- Left side -->
        <div class="level-left">

            <div class="level-item">

                <p class="subtitle is-5">
                    <strong>{{ $users->count() }}</strong> {{ trans('admin::dashboard.users') }}
                </p>

            </div>

            <div class="level-item">

                <form action="{{ route('admin.users.index') }}" method="get">

                    <p class="control has-addons">

                        <input name="search" value="{{ old('search', request('search')) }}" class="input" type="text" placeholder="Find a User">

                        <button type="submit" class="button" onclick="this.className += ' is-loading'">
                            Search
                        </button>

                    </p>

                </form>

            </div>

        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('admin.users.create') }}" class="button is-success">New User</a>
            </p>
        </div>

    </nav>

    <div class="table table-responsive">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Created</th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

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
