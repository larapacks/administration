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

                {!!
                    Form::open([
                        'url' => route('admin.users.roles.store', [$user->id])
                    ])
                !!}

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

                            {!!
                                Form::select('roles[]', $roles, null, [
                                    'class' => 'form-control selectize',
                                    'placeholder' => 'Select Roles ',
                                    'multiple' => true
                                ])
                            !!}

                            <p class="help-block">{{ $errors->first('roles') }}</p>

                        </div>

                    </div>

                    <div class="modal-footer">

                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

                    </div>

                </div>

                {!! Form::close() !!}

            </div>

        </div>

        <table class="table">

            <thead>

            <tr>

                <th>Role</th>

                <th>Remove</th>

            </tr>

            </thead>

            <tbody>

            @foreach($user->roles as $role)

                <tr>

                    <td>{{ $role->label }}</td>

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
