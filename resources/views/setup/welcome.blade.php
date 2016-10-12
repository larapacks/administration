@extends('admin::layouts.setup')

@section('content')

    <h1 class="has-text-centered">
        Welcome.
    </h1>

    @if($connected)
        <div class="notification is-success">
            <p>We're connected and ready to go.</p>
        </div>
    @else
        <div class="notification is-danger">
            Hmm... Looks like we can't connect to your database shown below.
        </div>
    @endif

    <div class="box">

        <article>

            <div class="media-content">

                <div class="content">

                    <h3>Database</h3>

                    <table class="table">

                        <tbody>

                            <tr>
                                <th>Database</th>
                                <td>{{ $database }}</td>
                            </tr>

                        </tbody>

                    </table>

                    <h3>Configuration</h3>

                        <table class="table">

                            <tbody>

                            @foreach($config as $key => $value)
                                <tr>
                                    <th>{{ $key }}</th>
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
    </p>

@endsection
