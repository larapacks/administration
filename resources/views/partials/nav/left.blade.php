@if(Auth::check())

    @if(Auth::user()->can('admin'))
        <li>
            <a href="{{ route('admin.dashboard.index') }}">
                <i class="fa fa-bars"></i>
                Dashboard
            </a>
        </li>
    @endif

    @if(Auth::user()->can('admin.users'))
        <li>
            <a href="{{ route('admin.users.index') }}">
                <i class="fa fa-users"></i>
                Users
            </a>
        </li>
    @endif

    @if(Auth::user()->can('admin.roles'))
        <li>
            <a href="{{ route('admin.roles.index') }}">
                <i class="fa fa-user-md"></i>
                Roles
            </a>
        </li>
    @endif

    @if(Auth::user()->can('admin.permissions'))
        <li>
            <a href="{{ route('admin.permissions.index') }}">
                <i class="fa fa-check-circle-o"></i>
                Permissions
            </a>
        </li>
    @endif

@endif
