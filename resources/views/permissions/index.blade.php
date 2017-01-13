@extends('admin::layouts.app')

@section('title', 'Permissions')

@section('content')

    <div class="table-responsive">

        <table class="table table-responsive table-striped">

            <thead>

                <tr>

                    <th>Label</th>

                    <th>Created</th>

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

                        <td>
                            {{ $permission->created_at->diffForHumans() }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="text-center">{{ $permissions->links() }}</div>

@endsection
