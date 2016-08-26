<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

    <input name="name" type="text" class="form-control" placeholder="Enter a name." value="{{ old('name', isset($user) ? $user->name : null) }}">

    <p class="help-block">{{ $errors->first('name') }}</p>

</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">

    <input name="email" type="email" class="form-control" placeholder="Enter an email address." value="{{ old('email', isset($user) ? $user->email : null) }}">

    <p class="help-block">{{ $errors->first('email') }}</p>

</div>

@if(isset($user) && $user->exists)

    <div class="form-group">

        <div class="alert alert-warning">
            Enter a password only if you would like to change the users current password.
        </div>

    </div>

@endif

<div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">

    <input name="password" type="password" class="form-control" placeholder="Enter a password.">

    <p class="help-block">{{ $errors->first('password') }}</p>

</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : null }}">

    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm the above password.">

    <p class="help-block">{{ $errors->first('password_confirmation') }}</p>

</div>
