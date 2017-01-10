@extends('admin::layouts.setup')

@section('content')

    <h1 class="has-text-centered">
        Welcome.
    </h1>

    @if($connected)
        <div class="notification is-success has-text-centered">
            <p>We're connected and ready to go.</p>
        </div>
    @else
        <div class="notification is-danger has-text-centered">
            <p>Hmm... Looks like we can't connect to your database shown below.</p>

            <p>Check your settings below and make sure they're correct.</p>
        </div>
    @endif

    <div class="box">

        <article>

            <div class="media-content">

                <div class="content">

                    <h3>Configuration</h3>

                        <table class="table">

                            <tbody>

                            @foreach($config as $key => $value)
                                <tr>
                                    <th>{{ ucfirst($key) }}</th>
                                    <td>
                                        @if($value)
                                            {{ $value }}
                                        @else
                                            <em>null</em>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                </div>

            </div>

        </article>

    </div>

    <p class="has-text-centered">
        <a class="button is-large is-primary {{ ! $connected ? 'is-disabled' : null }}" href="{{ route('admin.setup.migrations.create') }}">

            <span class="icon">
                <i class="fa fa-cog"></i>
            </span>

            <span>Begin Setup</span>
        </a>

        @if(!$connected)
            <a class="button is-large is-default" onclick="window.location.reload()">
                <span class="icon">
                    <i class="fa fa-refresh"></i>
                </span>

                <span>Refresh</span>
            </a>
        @endif
    </p>

@endsection
