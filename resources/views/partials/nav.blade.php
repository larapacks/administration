<div class="container">

    <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">
            {{ config('admin.title', 'Administration') }}
        </a>

    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">

            @include('admin::partials.nav.left')

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">

            @include('admin::partials.nav.right')

        </ul>

    </div>

</div>
