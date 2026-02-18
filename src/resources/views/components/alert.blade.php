@props(['type' => 'success', 'message'])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-700',
        'error' => 'bg-red-100 text-red-700',
    ];
@endphp

@if($message)
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition class="fixed top-4 right-4 z-50 p-4 rounded shadow-lg {{ $colors[$type] ?? $colors['success'] }} font-medium">
        {{ $message }}
    </div>
@endif
