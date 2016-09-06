<div class="panel panel-primary">

    <div class="panel-heading">
        <i class="fa fa-list"></i>
        Profile <span class="hidden-xs">Details</span>

        <div class="pull-right">

            <a href="{{ route('admin.permissions.edit', [$permission->getKey()]) }}" class="btn btn-xs btn-warning">
                <i class="fa fa-pencil"></i>
                Edit
            </a>

        </div>

    </div>

    <div class="panel-body">

        <table class="table table-striped">

            <tbody>

            <tr>
                <th>Label</th>
                <td>{{ $permission->label }}</td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $permission->name }}</td>
            </tr>

            </tbody>

        </table>

    </div>

</div>
