<label class="label">Name</label>

<p class="control has-icon">

    <input
            name="name"
            type="text"
            class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            placeholder="John Doe" value="{{ old('name', $user->name) }}"
    >

    <span class="icon is-small">
        <i class="fa fa-user"></i>
    </span>

    <span class="help is-danger">{{ $errors->first('name') }}</span>

</p>

<label class="label">Email</label>

<p class="control has-icon">

    <input
            name="email"
            type="email"
            class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
            placeholder="Enter an email address."
            value="{{ old('email', $user->email) }}"
    >

    <span class="icon is-small">
        <i class="fa fa-envelope"></i>
    </span>

    <span class="help is-danger">{{ $errors->first('email') }}</span>

</p>


@if($user->exists)

    <div class="notification is-warning">
        Enter a password only if you would like to change the users current password.
    </div>

@endif

<label class="label">Password</label>

<p class="control has-icon">

    <input
            name="password"
            type="password"
            class="input {{ $errors->has('password') ? 'is-danger' : '' }}"
            placeholder="Enter a password."
    >

    <span class="icon is-small">
        <i class="fa fa-key"></i>
    </span>

    <span class="help is-danger">{{ $errors->first('password') }}</span>

</p>

<label class="label">Confirm Password</label>

<p class="control has-icon">

    <input
            name="password_confirmation"
            type="password"
            class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}"
            placeholder="Confirm the above password."
    >

    <span class="icon is-small">
        <i class="fa fa-key"></i>
    </span>

    <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>

</p>
