<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página em Manutenção') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 text-white text-center">
        <h1 class="font_220 mb-5">Página em Manutenção</h1>
        <h2 class="font_150">Pedimos desculpa, estamos fazendo uma manutenção nesta página!</h2>
        <h2 class="font_150">Que tal, <a class="text-blue" href="{{route('dashboard')}}">voltar para o Início</a>?</h2>
    </div>
</x-app-layout>