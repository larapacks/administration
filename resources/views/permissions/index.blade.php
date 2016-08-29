@extends('admin::layouts.app')

@section('header')

    <h3>
        @section('title') All Permissions @show

        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-circle"></i>
            Create
        </a>
    </h3>

    <div class="clearfix"></div>

    <hr>

@endsection

@section('content')

    <table class="table table-responsive table-striped">

        <thead>

            <tr>

                <th>Label</th>

            </tr>

        </thead>

        <tbody>

            @foreach($permissions as $permission)

                <tr>

                    <td>

                        <a href="{{ route('admin.permissions.show', [$permission->getKey()]) }}">
                            {{ $permission->label }}
                        </a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="text-center">{!! $permissions !!}</div>

@endsection
