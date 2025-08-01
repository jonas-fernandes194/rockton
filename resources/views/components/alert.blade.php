@if(session($type ?? 'success'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    x-transition
    class="fixed top-5 right-5 z-50
        @if(($type ?? 'success') === 'success') bg-green-100 border border-green-400 text-green-700
        @elseif(($type ?? 'success') === 'error') bg-red-100 border border-red-400 text-red-700
        @endif
        px-6 py-4 rounded-lg shadow-lg flex items-center space-x-2"
    role="alert"
>
    @if(($type ?? 'success') === 'success')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-smile">
            <circle cx="12" cy="12" r="10"/>
            <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
            <line x1="9" x2="9.01" y1="9" y2="9"/>
            <line x1="15" x2="15.01" y1="9" y2="9"/>
        </svg>
    @endif

    <span>{{ session($type ?? 'success') }}</span>
    <button @click="show = false" class="ml-2 font-bold hover:opacity-75">&times;</button>
</div>
@endif
