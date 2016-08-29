@if(auth()->user()->can('admin.welcome.index'))
    <li>
        <a href="{{ route('admin.welcome.index') }}">
            <i class="fa fa-bars"></i>
            Dashboard
        </a>
    </li>
@endif

@if(auth()->user()->can('admin.users.index'))
    <li>
        <a href="{{ route('admin.users.index') }}">
            <i class="fa fa-users"></i>
            Users
        </a>
    </li>
@endif

@if(auth()->user()->can('admin.roles.index'))
    <li>
        <a href="{{ route('admin.roles.index') }}">
            <i class="fa fa-user-md"></i>
            Roles
        </a>
    </li>
@endif

@if(auth()->user()->can('admin.permissions.index'))
    <li>
        <a href="{{ route('admin.permissions.index') }}">
            <i class="fa fa-check-circle-o"></i>
            Permissions
        </a>
    </li>
@endif
