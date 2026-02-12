@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="rounded-xl bg-white/80 p-6 shadow">
            <p class="text-sm text-gray-400">Bandas</p>
            <p class="mt-2 text-3xl font-bold">128</p>
        </div>
        <div class="rounded-xl bg-white/80 p-6 shadow">
            <p class="text-sm text-gray-400">Músicas</p>
            <p class="mt-2 text-3xl font-bold">1.245</p>
        </div>
        <div class="rounded-xl bg-white/80 p-6 shadow">
            <p class="text-sm text-gray-400">Álbuns</p>
            <p class="mt-2 text-3xl font-bold">342</p>
        </div>
    </div>
@endsection
