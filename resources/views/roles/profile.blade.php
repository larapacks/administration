<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-list"></i>
        Profile <span class="hidden-xs">Details</span>

        <div class="btn-group pull-right">

            <a href="{{ route('admin.roles.edit', [$role->getKey()]) }}" class="btn btn-xs btn-warning">
                <i class="fa fa-edit"></i>
                Edit
            </a>

        </div>
    </div>

    <div class="panel-body">

        <table class="table table-striped">

            <tbody>

            <tr>
                <th>Label</th>
                <td>{{ $role->label }}</td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $role->name }}</td>
            </tr>

            </tbody>

        </table>

    </div>

</div>
