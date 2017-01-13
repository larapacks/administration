@if (session()->has('flash_notification.message'))
    <div class="notification is-{{ session('flash_notification.level') }}">
        <button type="button" class="delete"></button>

        {!! session('flash_notification.message') !!}
    </div>
@endif
