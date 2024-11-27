<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
        <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-5">
            <h1 class="text-center text-white font_150">Edição de Perfil | <strong>{{ old('name', $user->name) }}</strong></h1>
            <h3 class="text-center text-red font_100" style="margin-top: 8px !important;">Cuidado aqui! As alterações não podem ser desfeitas</h3>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mt-5">
                    <div class="col">
                        <!-- Nome -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                            <input type="text" name="name" id="name" class="bg-inputblue text-white rounded block mt-1 w-full" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                            <input type="email" name="email" id="email" class="bg-inputblue text-white rounded block mt-1 w-full" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <!-- Usuário Comum/Funcionario -->
                        <label for="user_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Usuário</label>
                            <select name="user_type" id="user_type" class="bg-inputblue text-white rounded block mt-1 w-full">
                                <option value="cliente" {{ $user->user_type == 'cliente' ? 'selected' : '' }}>cliente</option>
                                <option value="funcionario" {{ $user->user_type == 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                            </select>
                        @error('user_type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <!-- Classe do Usuário -->
                        <label for="user_class" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                            <select name="user_class" id="user_class" class="bg-inputblue text-white rounded block mt-1 w-full">
                                <option value="nada" {{ $user->user_class == 'nada' ? 'selected' : '' }}>Nada</option>
                                <option value="manutencao" {{ $user->user_class == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
                                <option value="vendedor" {{ $user->user_class == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                            </select>
                        @error('user_class')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <h2 class="text-center font_110 text-white mb-2">Informações Pessoais</h2>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="CLIENTE_CPF" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
                        <input type="text" name="CLIENTE_CPF" id="cpf" class="form-control bg-inputblue text-white rounded block mt-1 w-full" value="{{ old('CLIENTE_CPF', $user->CLIENTE_CPF) }}" maxlength="14" required>
                        @error('CLIENTE_CPF')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="CLIENTE_TEL" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
                        <input type="text" name="CLIENTE_TEL" id="telefone" class="form-control bg-inputblue text-white rounded block mt-1 w-full" value="{{ old('CLIENTE_TEL', $user->CLIENTE_TEL) }}" maxlength="15" required>
                        @error('CLIENTE_TEL')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="CLIENTE_DATA_NASC" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                        <input type="text" name="CLIENTE_DATA_NASC" id="data_nasc" class="form-control bg-inputblue text-white rounded block mt-1 w-full" value="{{ old('CLIENTE_DATA_NASC', isset($user->CLIENTE_DATA_NASC) ? sqlToDateBR($user->CLIENTE_DATA_NASC) : '') }}" required>
                        @error('CLIENTE_DATA_NASC')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Botões de ação -->
                <div class="flex justify-end mt-3">
                    <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded mr-2" style="margin-right: 15px !important;">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    function mascaraCPF(cpf) {
        cpf = cpf.replace(/\D/g, "");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
        return cpf;
    }
    document.getElementById('cpf').addEventListener('input', function (e) {
        e.target.value = mascaraCPF(e.target.value);
    });
    function mascaraTelefone(telefone) {
        telefone = telefone.replace(/\D/g, "");
        telefone = telefone.replace(/(\d{2})(\d)/, "($1) $2");
        telefone = telefone.replace(/(\d{5})(\d)/, "$1-$2");
        return telefone;
    }
    document.getElementById('telefone').addEventListener('input', function (e) {
        e.target.value = mascaraTelefone(e.target.value);
    });
    function mascaraData(data) {
        data = data.replace(/\D/g, "");
        data = data.replace(/(\d{2})(\d)/, "$1/$2");
        data = data.replace(/(\d{2})(\d)/, "$1/$2");
        data = data.replace(/(\d{4})\d+?$/, "$1");
        return data;
    }
    document.getElementById('data_nasc').addEventListener('input', function (e) {
        e.target.value = mascaraData(e.target.value);
    });
</script>
