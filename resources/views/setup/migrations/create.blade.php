@extends('admin::layouts.setup')

@section('content')

    <h1 class="has-text-centered">
        Setup Database Tables
    </h1>

    <div class="notification is-default">

        <p>
            We'll automatically run your database migrations for you,
            as well as seed crucial data for roles and permissions.
        </p>

    </div>

    <form method="POST" action="{{ route('admin.setup.migrations.store') }}">

        {{ csrf_field() }}

        <p class="has-text-centered">

            <button type="submit" class="button is-primary is-large">

            <span class="icon">
                <i class="fa fa-cogs"></i>
            </span>

                <span>Start Migrations</span>

            </button>

        </p>

    </form>

@endsection
