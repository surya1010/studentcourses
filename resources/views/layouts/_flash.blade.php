@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session()->get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" >&times; </button>
        {!! session()->get('flash_notification.message') !!}
    </div>
@endif