@if (auth()->guest())

    <a class="nav-item" href="{{ route('admin.auth.login') }}">
        {{ trans('admin::layouts.partials.nav.login') }}
    </a>

@else

    <a class="nav-item" href="{{ route('admin.users.show', [auth()->user()->id]) }}">
        Profile
    </a>

    <span class="nav-item">
        <a class="button" href="{{ route('admin.auth.logout') }}"
           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
            <span class="icon">
                <i class="fa fa-paper-plane-o"></i>
            </span>

            <span>
                {{ trans('admin::layouts.partials.nav.logout') }}
            </span>
        </a>
    </span>

    <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" class="hidden">
        {{ csrf_field() }}
    </form>

@endif
