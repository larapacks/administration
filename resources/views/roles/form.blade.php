<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

    <label class="help-block">Name</label>

    @if(isset($role) && $role->isAdministrator())

        <div class="alert alert-warning alert-important">
            <p>You cannot change the administrators role name.</p>
        </div>


        <input name="name" type="hidden" value="{{ $role->name }}">

    @endif

    <input
            name="name"
            type="text"
            {{ isset($role) && $role->isAdministrator() ? 'disabled' : null }}
            class="form-control"
            placeholder="Enter a role name."
            value="{{ old('name', isset($role) ? $role->name : null) }}"
    >

    <p class="help-block">{{ $errors->first('name') }}</p>

</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : null }}">

    <label class="help-block">Label</label>

    <input name="label" type="text" class="form-control" placeholder="Enter a role label." value="{{ old('label', isset($role) ? $role->label : null) }}">

    <p class="help-block">{{ $errors->first('label') }}</p>

</div>
