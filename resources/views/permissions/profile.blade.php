<div class="panel panel-primary">

    <div class="panel-heading">
        <i class="fa fa-list"></i>
        Profile <span class="hidden-xs">Details</span>

        <div class="btn-group pull-right">

            <a href="{{ route('admin.permissions.edit', [$permission->getKey()]) }}" class="btn btn-xs btn-warning">
                <i class="fa fa-edit"></i>
                Edit
            </a>

            <a
                    data-post="DELETE"
                    data-title="Delete Permission?"
                    data-message="Are you sure you want to delete this permission?"
                    href="{{ route('admin.permissions.destroy', [$permission->getKey()]) }}"
                    class="btn btn-xs btn-danger"
            >
                <i class="fa fa-trash"></i>
                Delete
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
