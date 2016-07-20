<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

    {{ Form::text('name', null, ['placeholder' => 'Enter the name.', 'class' => 'form-control']) }}

    <p class="help-block">{{ $errors->first('name') }}</p>

</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">

    {{ Form::text('email', null, ['placeholder' => 'Enter the users email address.', 'class' => 'form-control']) }}

    <p class="help-block">{{ $errors->first('email') }}</p>

</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">

    {{ Form::password('password', ['placeholder' => 'Enter the users password.', 'class' => 'form-control']) }}

    <p class="help-block">{{ $errors->first('password') }}</p>

</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : null }}">

    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm the users above password.', 'class' => 'form-control']) }}

    <p class="help-block">{{ $errors->first('password_confirmation') }}</p>

</div>
