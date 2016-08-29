<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-user-md"></i>
        Roles <span class="hidden-xs">that this Permission is apart of</span>

        <a data-toggle="modal" data-target="#form-roles" class="btn btn-xs btn-success pull-right">
            <i class="fa fa-plus-circle"></i>
            Add
        </a>

    </div>

    <div class="panel-body">

        <div class="modal fade" id="form-roles" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h4 class="modal-title">
                            <i class="fa fa-user-md"></i>
                            Add Roles
                        </h4>

                    </div>

                    <form method="POST" action="{{ route('admin.permissions.roles.store', [$permission->getKey()]) }}">


                        <div class="modal-body">

                            <select name="roles[]" multiple class="form-control selectize" placeholder="Select permissions ">

                                @foreach($roles as $role)
                                    <option value="{{ $role->getKey() }}">{{ $role->label }}</option>
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

                @foreach($permission->roles as $role)

                    <tr>

                        <td>{{ $role->label }}</td>
                        <td></td>

                    </tr>

                @endforeach

                @if($permission->roles->isEmpty())

                    <tr><td colspan="2" class="text-muted">There are no roles to display.</td></tr>

                @endif

                </tbody>


            </table>

        </div>

    </div>

</div>
