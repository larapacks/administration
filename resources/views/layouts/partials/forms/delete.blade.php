<form
        method="POST"
        action="{{ $action }}"
        onclick="return confirm('{{ $message }}');"
>
    {{ csrf_field() }}

    {{ method_field('DELETE') }}

    <button class="btn btn-block btn-danger" type="submit">
        <i class="fa fa-trash"></i>
        {{ trans('admin::layouts.partials.forms.delete') }}
    </button>

</form>
