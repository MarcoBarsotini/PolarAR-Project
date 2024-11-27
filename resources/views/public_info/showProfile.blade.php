<style>
    .subtitle {
        color: #cfcccc !important;
    }
    .profile-image {
        width: 200px !important;
        height: 200px !important;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Cliente') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 bg-gray-800 p-6 rounded-lg shadow-lg">
        @if ($user->profile_photo)
            <img src="{{ Storage::url($user->profile_photo) }}" class="profile-image" alt="Foto de {{ $user->name }}">
        @else
            <img src="{{ asset('images/default_profile.png') }}" class="profile-image" alt="Foto Padrão">
        @endif
        <h3 class="text-white font_220">{{ $user->name }}</h3>
        <p class="subtitle">Email: {{ $user->email }}</p>
        <p class="subtitle">CPF: {{ $user->CLIENTE_CPF }}</p>
        <p class="subtitle">Data de Nascimento: {{ sqlToDateBR($user->CLIENTE_DATA_NASC) }}</p>
        
        <div class="mt-6">
            <h4 class="text-lg text-white">Sobre Mim:</h4>
            <p class="subtitle">{{ $user->descricao_perfil }}</p>
        </div>

        <div class="mt-4">
            <h4 class="text-lg text-white">Endereço:</h4>
            <p class="subtitle">{{ $user->CLIENTE_ENDERECO }}</p>
            <p class="subtitle">{{ $user->CLIENTE_CIDADE }}, {{ $user->CLIENTE_ESTADO }} - {{ $user->CLIENTE_CEP }}</p>
            <p class="subtitle">{{ $user->CLIENTE_PAIS }}</p>
        </div>

        <div class="mt-4">
            <h4 class="text-lg text-white">Contato:</h4>
            <p class="subtitle">Telefone: {{ $user->CLIENTE_TEL ?? 'Não Informado' }}</p>
        </div>

        <div class="mt-4">
            <h4 class="text-lg text-white">Avaliação:</h4>
            <div class="flex">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $user->user_rating)
                        <i class="fas fa-star" style="color: gold;"></i>
                    @else
                        <i class="far fa-star" style="color: gray;"></i>
                    @endif
                @endfor
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="font_110" style="color: #3838ff;">Voltar</a>
        </div>
    </div>
    @include('layouts.footer')
</x-app-layout>