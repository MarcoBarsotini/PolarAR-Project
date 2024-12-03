<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Criar Novo Usuário') }}
        </h2>
    </x-slot>
    <div class="text-center text-white mt-4">
        <h1 class="font_220">Criar novo Usuário</h1>
        <h3 class="font_110">Preencha as informações para criar um novo usuário</h3>
    </div>
    <div class="container mx-auto mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <!-- Informações do usuário -->
            <div class="row">
                <div class="col mb-4">
                    <label for="name" class="form-label text-white">Nome</label>
                    <input type="text" name="name" class="form-control rounded" id="name" required>
                </div>
                <div class="col mb-4">
                    <label for="email" class="form-label text-white">E-mail</label>
                    <input type="email" name="email" class="form-control rounded" id="email" required>
                </div>
            </div>
            <!-- Senha -->
            <div class="row">
                <div class="col mb-4">
                    <label for="password" class="form-label text-white">Senha</label>
                    <input type="password" name="password" class="form-control rounded" id="password" required>
                </div>
                <div class="col mb-4">
                    <label for="password_confirmation" class="form-label text-white">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="form-control rounded" id="password_confirmation" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="descricao_perfil" class="form-label text-white">Descrição do Perfil</label>
                <input type="descricao_perfil" name="descricao_perfil" class="form-control rounded" id="descricao_perfil" required>
            </div>
            <!-- Informações do usuário -->
            <div class="row">
                <div class="col mb-4">
                    <label for="user_type" class="form-label">Tipo de Usuário</label>
                    <select name="user_type" id="user_type" class="form-select" required>
                        <option value="cliente">Cliente</option>
                    </select>
                </div>
                <div class="col mb-4">
                    <label for="user_class" class="form-label">Classe do Usuário</label>
                    <input type="text" name="user_class" class="form-control rounded" id="user_class" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</x-app-layout>