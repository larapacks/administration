<!-- Authentication Links -->
@if (auth()->guest())

    <li><a href="{{ url('/login') }}">Login</a></li>

@else

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ auth()->user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
        </ul>

    </li>

@endif