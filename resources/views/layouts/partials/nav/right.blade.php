@if (Auth::guest())

    <li>
        <a href="{{ url('/login') }}">
            {{ trans('admin::layouts.partials.nav.login') }}
        </a>
    </li>

@else

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('admin.auth.logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-btn fa-sign-out"></i>
                    {{ trans('admin::layouts.partials.nav.logout') }}
                </a>
            </li>

            <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </ul>

    </li>

@endif
