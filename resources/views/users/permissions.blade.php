<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-check-circle-o"></i>

        <span class="hidden-xs">User Specific</span> Permissions

        <a data-toggle="modal" data-target="#form-permissions" class="btn btn-xs btn-success pull-right">

            <i class="fa fa-plus-circle"></i>

            Add

        </a>

    </div>

    <div class="panel-body">

        <div class="modal fade" id="form-permissions" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                {!!
                    Form::open([
                        'url' => route('admin.users.permissions.store', [$user->id])
                    ])
                !!}

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

                    <div class="modal-body">

                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : null }}">

                            {!!
                                Form::select('permissions[]', $permissions, null, [
                                    'class' => 'form-control selectize',
                                    'placeholder' => 'Select Permissions ',
                                    'multiple' => true
                                ])
                            !!}

                            <p class="help-block">{{ $errors->first('permissions') }}</p>

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

                <th>Permission</th>

                <th>Remove</th>

            </tr>

            </thead>

            <tbody>

            @foreach($user->permissions as $permission)

                <tr>

                    <td>{{ $permission->label }}</td>

                    <td>

                        <a
                                class="btn btn-xs btn-danger"
                                data-post="delete"
                                data-message="Are you sure you want to remove permission '{{ $permission->label }}'?"
                                href="{{ route('admin.users.permissions.destroy', [$user->id, $permission->id]) }}"
                        >
                            Remove
                        </a>

                    </td>

                </tr>

            @endforeach

            @if($user->permissions->isEmpty())

                <tr><td class="text-muted">There are no permissions to display.</td></tr>

            @endif

            </tbody>

        </table>

    </div>

</div>