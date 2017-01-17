<nav class="level">

    <div class="level-left">

        <div class="level-item">

            <p class="subtitle is-5">
                <strong>{{ $user->permissions->count() }}</strong> {{ trans('admin::layouts.partials.nav.permissions') }}
            </p>

        </div>

    </div>

    <div class="level-right">

        @if(auth()->user()->can('admin.permissions'))

            <p class="level-item">

                <a class="button is-success modal-button" data-target="#form-permissions">

                    <span class="icon is-small">
                        <i class="fa fa-plus-circle"></i>
                    </span>

                    <span>Add</span>

                </a>

            </p>

        @endif

    </div>

</nav>

@if(auth()->user()->can('admin.permissions'))

    <div class="modal" id="form-permissions">

        <div class="modal-background"></div>

        <div class="modal-card">

            <form method="POST" action="{{ route('admin.users.permissions.store', [$user->id]) }}">

            {{ csrf_field() }}

                <header class="modal-card-head">

                    <p class="modal-card-title">Add Permissions</p>

                    <button type="button" class="delete"></button>

                </header>

                <section class="modal-card-body" style="min-height: 200px;">

                    <select name="permissions[]" class="selectize" multiple placeholder="Select permissions">
                        @foreach($permissions as $id => $permission)
                            <option {{ old('permissions') == $id ? 'selected' : null }} value="{{ $id }}">{{ $permission }}</option>
                        @endforeach
                    </select>

                    <span class="help is-danger">{{ $errors->first('permissions') }}</span>

                    <div class="is-clearfix"></div>

                </section>

                <footer class="modal-card-foot">

                    <a class="button">Cancel</a>

                    <button type="submit" class="button is-primary">Save changes</button>

                </footer>

            </form>

        </div>

    </div>

@endif

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

            <td>
                @if(auth()->user()->can('admin.permissions'))

                    <a href="{{ route('admin.permissions.show', [$permission->getKey()]) }}">
                        {{ $permission->label }}
                    </a>

                @else

                    {{ $permission->label }}

                @endif

            </td>

            <td>

                @if(auth()->user()->can('admin.permissions'))

                    @include('admin::layouts.partials.forms.remove', [
                        'action' => route('admin.users.permissions.destroy', [$user->id, $permission->id]),
                        'message' => "Are you sure you want to remove permission: {$permission->label}?",
                    ])

                @endif

            </td>

        </tr>

    @endforeach

    @if($user->permissions->isEmpty())

        <tr>
            <td colspan="2" class="text-muted">There are no permissions to display.</td>
        </tr>

    @endif

    </tbody>

</table>
