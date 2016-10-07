<div class="panel panel-primary">

    <div class="panel-heading">

        <i class="fa fa-check-circle-o"></i>

        <span class="hidden-xs">User Specific</span> Permissions

        @if(Auth::user()->can('admin.permissions'))

            <a data-toggle="modal" data-target="#form-permissions" class="btn btn-xs btn-success pull-right">

                <i class="fa fa-plus-circle"></i>

                Add

            </a>

        @endif

    </div>

    <div class="panel-body">

        @if(Auth::user()->can('admin.permissions'))

            <div class="modal fade" id="form-permissions" tabindex="-1" role="dialog">

                <div class="modal-dialog">

                    <form method="POST" action="{{ route('admin.users.permissions.store', [$user->id]) }}">

                        {{ csrf_field() }}

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

                                    <select name="permissions[]" class="form-control selectize" multiple placeholder="Select permissions">
                                        @foreach($permissions as $id => $permission)
                                            <option {{ old('permissions') == $id ? 'selected' : null }} value="{{ $id }}">{{ $permission }}</option>
                                        @endforeach
                                    </select>

                                    <p class="help-block">{{ $errors->first('permissions') }}</p>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Add</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>

                <tr>

                    <th>Permission</th>

                    <th>Remove</th>

                </tr>

                </thead>

                <tbody>

                @foreach($user->permissions as $permission)

                    <tr>

                        <td>
                            @if(Auth::user()->can('admin.permissions'))

                                <a href="{{ route('admin.permissions.show', [$permission->getKey()]) }}">
                                    {{ $permission->label }}
                                </a>

                            @else

                                {{ $permission->label }}

                            @endif

                        </td>

                        <td>

                            @if(Auth::user()->can('admin.permissions'))

                                @include('admin::layouts.partials.forms.remove', [
                                    'action' => route('admin.users.permissions.destroy', [$user->id, $permission->id]),
                                    'message' => "Are you sure you want to remove permission: {$permission->label}?",
                                ])

                            @endif

                        </td>

                    </tr>

                @endforeach

                @if($user->permissions->isEmpty())

                    <tr><td colspan="2" class="text-muted">There are no permissions to display.</td></tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>

</div>
