<div class="card">

    <header class="card-header">

        <p class="card-header-title">
            Profile
        </p>

    </header>

    <div class="card-content">

        <div class="content">

            <label class="label">Name</label>

            <p>{{ $user->name }}</p>

            <label class="label">Email</label>

            <p>{{ $user->email }}</p>

            <label class="label">Created</label>

            <p>{{ $user->created_at->diffForHumans() }}</p>

            <label class="label">Last Updated</label>

            <p>{{ $user->updated_at->diffForHumans() }}</p>

        </div>

    </div>

    <footer class="card-footer">
        <a class="card-footer-item" href="{{ route('admin.users.edit', [$user->id]) }}">Edit</a>
        <a class="card-footer-item">Delete</a>
    </footer>

</div>
