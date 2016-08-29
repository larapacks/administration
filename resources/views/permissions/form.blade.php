<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">

    <label class="help-block">Name</label>

    <input name="name" type="text" class="form-control" placeholder="Enter a permission name." value="{{ old('name', isset($permission) ? $permission->name : null) }}">

    <p class="help-block">{{ $errors->first('name') }}</p>

</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : null }}">

    <label class="help-block">Label</label>

    <input name="label" type="text" class="form-control" placeholder="Enter a permission label." value="{{ old('label', isset($permission) ? $permission->label : null) }}">

    <p class="help-block">{{ $errors->first('label') }}</p>

</div>
