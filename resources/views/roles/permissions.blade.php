<div class="panel panel-primary">

    <div class="panel-heading">
        <i class="fa fa-check-circle-o"></i>
        Permissions <span class="hidden-xs">in this Role</span>

        <a data-toggle="modal" data-target="#form-permissions" class="btn btn-xs btn-success pull-right">
            <i class="fa fa-plus-circle"></i>
            Add
        </a>
    </div>

    <div class="panel-body">

        <div class="modal fade" id="form-permissions" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h4 class="modal-title">
                            <i class="fa fa-check-circle-o"></i>
                            Add Permissions
                        </h4>

                    </div>

                    <form method="POST" action="{{ route('admin.roles.permissions.store', [$role->getKey()]) }}">

                        {{ csrf_field() }}

                        <div class="modal-body">

                            <label>Permissions</label>

                            <select name="permissions[]" multiple class="form-control selectize" placeholder="Select permissions ">

                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->getKey() }}">{{ $permission->label }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Add</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>Label</th>
                        <th>Remove</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($rolePermissions as $permission)

                        <tr>

                            <td>
                                <a href="{{ route('admin.permissions.show', [$permission->getKey()]) }}">
                                    {{ $permission->label }}
                                </a>
                            </td>

                            <td>
                                <a
                                        class="btn btn-xs btn-danger"
                                        data-post="delete"
                                        data-message="Are you sure you want to remove permission '{{ $permission->label }}' from '{{ $role->label }}'?"
                                        href="{{ route('admin.roles.permissions.destroy', [$role->id, $permission->id]) }}"
                                >
                                    Remove
                                </a>
                            </td>

                        </tr>

                    @endforeach

                    @if($rolePermissions->isEmpty())

                        <tr><td colspan="2" class="text-muted">There are no permissions to display.</td></tr>

                    @endif

                </tbody>

            </table>

            <div class="text-center">
                {{ $rolePermissions->appends(request()->all())->links() }}
            </div>

        </div>

    </div>

</div>
