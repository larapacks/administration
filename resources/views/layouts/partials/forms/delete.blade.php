<form
        method="POST"
        action="{{ $action }}"
        onclick="return confirm('{{ $message }}');"
>
    {{ csrf_field() }}

    {{ method_field('DELETE') }}

    <button class="button is-danger" type="submit">

        <span>
            {{ trans('admin::layouts.partials.forms.delete') }}
        </span>

    </button>

</form>
