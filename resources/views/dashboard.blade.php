<style>
    .container_contratos {
        width: 80%;
        padding: 20px !important;
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/Dashboard/dashboard.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container text-center" style="margin-bottom: 100px !important;">
        <h1 class="text-white text-center font_230 negrito" style="margin-top: 15px !important; padding-bottom: 15px !important;">Bem-vindo, <strong>{{ $user->name }}</strong>!</h1>

        <div class="image-container flex justify-center">
            @if (Auth::user()->profile_photo)
                <img src="{{ Storage::url(Auth::user()->profile_photo) }}" class="profile" alt="Foto de Perfil" width="150">
            @else
                <img src="{{ asset('images/default_profile.png') }}" class="profile" alt="Foto de Perfil Padrão" width="150">
            @endif
        </div>

        <div class="user-rating text-center mt-4">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $user->user_rating)
                    <i class="fas fa-star" style="color: gold;"></i>
                @else
                    <i class="far fa-star" style="color: gray;"></i>
                @endif
            @endfor
        </div>

        <div class="text-center mt-4">
            <h4 class="text-white font_150">Você está com {{$user->user_rating}} estrelas!</h4>
            <span class="font_80 text-white">Uma dica: Seja atencioso, o cliente pode avaliar você no final do serviço!</span>
        </div>
    </div>

    <!-- Sistema de Contratos Pendentes -->
    <div class="container_contratos mx-auto mt-6 bg-darkblue">
        <h3 class="text-white text-center font_150">OS's Pendentes</h3>
        @if($contracts->isEmpty())
            <p class="text-white text-center font_120 mt-4">Você não tem nenhuma Ordem de Serviço pendente no momento.</p>
        @else
            <table class="table-auto w-full text-white mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 font_110">Nome do Cliente</th>
                        <th class="px-4 py-2 font_110">Descrição</th>
                        <th class="px-4 py-2 font_110">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                        <tr>
                            <td class="border px-4 py-2">
                                <a href="{{ route('clientes.show', $contract->contractor->id) }}" class="font_110">{{ $contract->contractor->name }}</a>
                            </td>
                            <td class="border px-4 py-2 font_110">
                                {{ \Illuminate\Support\Str::limit($contract->descricao_servico, 30) }}
                                @if (Str::length($contract->descricao_servico) > 30)
                                    <button class="btn btn-link text-blue-500" data-bs-toggle="modal" data-bs-target="#modal-{{ $contract->id }}">Ver Mais</button>
                                @endif
                            </td>
                            <td class="border px-4 py-2 font_110">
                                <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="aceito" class="btn btn-success text-white px-4 py-2 rounded">Aceitar</button>
                                    <button type="submit" name="status" value="rejeitado" class="btn btn-danger text-white px-4 py-2 rounded">Rejeitar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal do serviço -->
                        <div class="modal fade" id="modal-{{ $contract->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $contract->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-darkblue">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-white" id="modalLabel-{{ $contract->id }}">Descrição Completa do Serviço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-white" style="word-wrap: break-word;">{{ $contract->descricao_servico }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('layouts.footer')
</x-app-layout>