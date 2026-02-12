@extends('layouts.site')
@section('title', 'Home')
@section('content')
<section class="relative h-screen w-full bg-cover bg-center bg-no-repeat" style="background-image: url('imagens/banner.png');">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative z-10 h-full flex items-center justify-end px-6 md:px-45">
        <div class="max-w-xl text-right text-white space-y-6">
            <h1 class="text-4xl md:text-4xl font-bold leading-tight">
                <span class="block text-neutral-400">DESCUBRA</span>
                Quem faz a música acontecer.
            </h1>
            <p class="text-lg md:text-xl text-gray-200">
                Histórias, trajetórias que vão além do palco.
            </p>
            <a href="#" class="inline-block mt-4 px-8 py-4 bg-neutral-600 hover:bg-neutral-700 
                      transition duration-300 ease-in-out 
                      text-white font-semibold rounded-lg shadow-lg 
                      hover:scale-105">
                Mergulhe no universo da música
            </a>
        </div>
    </div>
</section>
@endsection