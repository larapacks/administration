<div class="form-group">

    <label class="help-block">Name</label>

    <div class="alert alert-warning alert-important">
        <p>You cannot edit permission names.</p>
    </div>

    <input name="name" disabled type="text" value="{{ $permission->name }}" class="form-control" placeholder="Enter the name of the permission.">

</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : null }}">

    <label class="help-block">Label</label>

    <input name="label" type="text" class="form-control" placeholder="Enter a permission label." value="{{ old('label', $permission->label) }}">

    <p class="help-block">{{ $errors->first('label') }}</p>

</div>
