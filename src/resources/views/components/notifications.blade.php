@php
    $notifications = [
        'success' => session('success'),
        'warning' => session('warning'),
        'error' => session('error'),
        'info' => session('info'),
    ];
@endphp

@foreach ($notifications as $type => $message)
    @if ($message)
        <div
            data-notification
            data-notification-type="{{ $type }}"
            data-notification-message="{{ $message }}"
            hidden
        ></div>
    @endif
@endforeach

@if (isset($errors) && $errors->any())
    <div
        data-notification
        data-notification-type="error"
        data-notification-message="{{ $errors->first() }}"
        hidden
    ></div>
@endif
