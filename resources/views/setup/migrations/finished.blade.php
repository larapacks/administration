@extends('admin::layouts.setup')

@section('content')

    <div class="has-text-centered">

        <h1>Successfully migrated database tables.</h1>

        <hr>

        <p>

            <a
                    href="{{ route('admin.setup.account.create') }}"
                    class="button is-large is-primary"
            >
                <span class="icon">
                    <i class="fa fa-user-md"></i>
                </span>

                <span>
                    Create an Administrator Account
                </span>
            </a>

        </p>

    </div>

@endsection
