@inject('menu', 'Larapacks\Administration\Menu')

@if(Auth::check())

    @if(Auth::user()->can('admin'))
        <a
                class="nav-item is-tab {{ $menu::isActiveRoute('admin.dashboard.index')  }}"
                href="{{ route('admin.dashboard.index') }}"
        >
            {{ trans('admin::layouts.partials.nav.dashboard') }}
        </a>
    @endif

    @if(Auth::user()->can('admin.users'))
        <a
                class="nav-item is-tab {{ $menu::isActiveRoute('admin.users.index')  }}"
                href="{{ route('admin.users.index') }}"
        >
            {{ trans('admin::layouts.partials.nav.users') }}
        </a>
    @endif

    @if(Auth::user()->can('admin.roles'))
        <a
                class="nav-item is-tab {{ $menu::isActiveRoute('admin.roles.index')  }}"
                href="{{ route('admin.roles.index') }}"
        >
            {{ trans('admin::layouts.partials.nav.roles') }}
        </a>
    @endif

    @if(Auth::user()->can('admin.permissions'))
        <a
                class="nav-item is-tab {{ $menu::isActiveRoute('admin.permissions.index')  }}"
                href="{{ route('admin.permissions.index') }}"
        >
            {{ trans('admin::layouts.partials.nav.permissions') }}
        </a>
    @endif

@endif
