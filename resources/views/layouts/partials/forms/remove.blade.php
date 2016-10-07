<form
        method="POST"
        action="{{ $action }}"
        onclick="return confirm('{{ $message }}');"
>
    {{ csrf_field() }}

    {{ method_field('DELETE') }}

    <button class="btn btn-xs btn-danger" type="submit">
        Remove
    </button>

</form>
