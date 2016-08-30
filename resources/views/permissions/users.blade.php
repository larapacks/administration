<div class="panel panel-primary">

    <div class="panel-heading">
        <i class="fa fa-users"></i>
        Users <span class="hidden-xs">that specifically have this Permission</span>

        <a data-toggle="modal" data-target="#form-users" class="btn btn-xs btn-success pull-right">
            <i class="fa fa-plus-circle"></i>
            Add
        </a>
    </div>

    <div class="panel-body">

        <div class="modal fade" id="form-users" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h4 class="modal-title">
                            <i class="fa fa-users"></i>
                            Add Users
                        </h4>

                    </div>

                    <form method="POST" action="{{ route('admin.permissions.users.store', [$permission->getKey()]) }}">

                        {{ csrf_field() }}

                        <div class="modal-body">

                            <label>Users</label>

                            <select name="users[]" multiple class="form-control selectize" placeholder="Select users ">

                                @foreach($users as $user)
                                    <option value="{{ $user->getKey() }}">{{ $user->name }}</option>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Remove</th>
                </tr>

                </thead>

                <tbody>

                @foreach($permission->users as $user)

                    <tr>

                        <td>
                            <a href="{{ route('admin.users.show', [$user->getKey()]) }}">
                                {{ $user->name }}
                            </a>
                        </td>

                        <td>{{ $user->email }}</td>

                        <td>
                            <a
                                    class="btn btn-xs btn-danger"
                                    data-post="delete"
                                    data-message="Are you sure you want to remove user '{{ $user->name }}'?"
                                    href="{{ route('admin.users.permissions.destroy', [$user->id, $permission->id]) }}"
                            >
                                Remove
                            </a>
                        </td>

                    </tr>

                @endforeach

                @if($permission->users->isEmpty())

                    <tr><td colspan="3" class="text-muted">There are no users to display.</td></tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>

</div>
