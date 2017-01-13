<div class="card">

    <header class="card-header">

        <p class="card-header-title">
            Profile
        </p>

        <a class="card-header-icon">
            <span class="icon">
                <i class="fa fa-angle-down"></i>
            </span>
        </a>

    </header>

    <div class="card-content">

        <div class="content">

            <table class="table is-narrow">

                <tbody>

                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</td>
                    </tr>

                    <tr>
                        <th>Last Updated</th>
                        <td title="{{ $user->updated_at }}">{{ $user->updated_at->diffForHumans() }}</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <footer class="card-footer">
        <a class="card-footer-item">Save</a>
        <a class="card-footer-item">Edit</a>
        <a class="card-footer-item">Delete</a>
    </footer>

</div>

<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-list"></i>

        Profile

        <div class="btn-group pull-right">

            <a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-xs btn-warning">
                <i class="fa fa-edit"></i>
                Edit
            </a>

        </div>

    </div>

    <div class="panel-body">

        <table class="table table-striped">

            <tbody>

                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>Created</th>
                    <td title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                    <th>Last Updated</th>
                    <td title="{{ $user->updated_at }}">{{ $user->updated_at->diffForHumans() }}</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>
