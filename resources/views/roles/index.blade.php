@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') All Roles @show

        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-circle"></i>
            Create
        </a>
    </h3>

    <div class="clearfix"></div>

    <hr>

@endsection

@section('content')

    <div class="table-responsive">

        <table class="table table-striped">

            <thead>

                <tr>
                    <th>Label</th>

                    <th>Created</th>
                </tr>

            </thead>

            <tbody>

                @foreach($roles as $role)

                    <tr>

                        <td>
                            <a href="{{ route('admin.roles.show', [$role->getKey()]) }}">{{ $role->label }}</a>
                        </td>

                        <td>{{ $role->created_at->diffForHumans() }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="text-center">{{ $roles->links() }}</div>

@endsection
