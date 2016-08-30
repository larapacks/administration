<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-user-md"></i>

        Roles

        <a data-toggle="modal" data-target="#form-roles" class="btn btn-xs btn-success pull-right">

            <i class="fa fa-plus-circle"></i>

            Add

        </a>

    </div>

    <div class="panel-body">

        <div class="modal fade" id="form-roles" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <form method="POST" action="{{ route('admin.users.roles.store', [$user->id]) }}">

                    {{ csrf_field() }}

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

                        <div class="modal-body">

                            <div class="form-group {{ $errors->has('roles') ? 'has-error' : null }}">

                                <select name="roles[]" class="form-control selectize" multiple placeholder="Select Roles">
                                    @foreach($roles as $id => $role)
                                        <option {{ old('roles') == $id ? 'selected': null }} value="{{ $id }}">{{ $role }}</option>
                                    @endforeach
                                </select>

                                <p class="help-block">{{ $errors->first('roles') }}</p>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Add</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>

                <tr>

                    <th>Role</th>

                    <th>Remove</th>

                </tr>

                </thead>

                <tbody>

                @foreach($user->roles as $role)

                    <tr>

                        <td>
                            <a href="{{ route('admin.roles.show', [$role->getKey()]) }}">
                                {{ $role->label }}
                            </a>
                        </td>

                        <td>

                            <a
                                    class="btn btn-xs btn-danger"
                                    data-post="delete"
                                    data-message="Are you sure you want to remove role '{{ $role->label }}'?"
                                    href="{{ route('admin.users.roles.destroy', [$user->id, $role->id]) }}"
                            >
                                Remove
                            </a>

                        </td>

                    </tr>

                @endforeach

                @if($user->roles->isEmpty())

                    <tr><td class="text-muted">There are no roles to display.</td></tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>

</div>
