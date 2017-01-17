<nav class="level">

    <div class="level-left">

        <div class="level-item">

            <p class="subtitle is-5">
                <strong>{{ $user->roles->count() }}</strong> {{ trans('admin::layouts.partials.nav.roles') }}
            </p>

        </div>

    </div>

    <div class="level-right">

        @if(auth()->user()->can('admin.roles'))

            <p class="level-item">
                <a class="button is-success">
                    <span class="icon is-small">
                        <i class="fa fa-plus-circle"></i>
                    </span>

                    <span>Add</span>
                </a>
            </p>

        @endif

    </div>

</nav>

@if(auth()->user()->can('admin.roles'))

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

@endif

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

            <td>
                @if(auth()->user()->can('admin.roles'))

                    <a href="{{ route('admin.roles.show', [$role->getKey()]) }}">
                        {{ $role->label }}
                    </a>

                @else

                    {{ $role->label }}

                @endif
            </td>

            <td>
                @if(auth()->user()->can('admin.roles'))

                    @include('admin::layouts.partials.forms.remove', [
                        'action' => route('admin.users.roles.destroy', [$user->id, $role->id]),
                        'message' => "Are you sure you want to remove role: {$role->label}?",
                    ])

                @endif

            </td>

        </tr>

    @endforeach

    @if($user->roles->isEmpty())

        <tr>
            <td colspan="2" class="text-muted">There are no roles to display.</td>
        </tr>

    @endif

    </tbody>

</table>
