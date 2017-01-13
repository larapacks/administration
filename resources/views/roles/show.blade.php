@extends('admin::layouts.app')

@section('title', $role->label)

@section('content')

    @include('admin::roles.profile')

    @include('admin::roles.users')

    @include('admin::roles.permissions')

    <div class="col-md-2 col-md-offset-5">
        {{-- Prevent user from deleting role that they are apart of. --}}
        @if (!request()->user()->hasRole($role->name))

            @include('admin::layouts.partials.forms.delete', [
                'action' => route('admin.roles.destroy', [$role->getKey()]),
                'message' => 'Are you sure you want to delete this role?',
            ])

        @endif
    </div>

@endsection
