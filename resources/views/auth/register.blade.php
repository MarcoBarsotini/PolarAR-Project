<x-guest-layout>
    <form id="multiStepForm" method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Etapa 1 - Informações Básicas --}}
        <div id="step-1" class="step">
            <h1 class="text-white font_100 text-center" style="margin-bottom: 18px !important;">Vamos começar com suas <strong>informaçoes</strong></h1>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-white font_70" href="{{ route('login') }}">Já tem uma conta?</a>
                <x-primary-button type="button" class="ms-4" onclick="nextStep()">
                    {{ __('Continuar') }}
                </x-primary-button>
            </div>
        </div>

        {{-- Etapa 2 - Endereço --}}
        <div id="step-2" class="step" style="display: none;">
            <h1 class="text-white font_100 text-center" style="margin-bottom: 18px !important;">Precisamos do seu <strong>Endereço</strong></h1>
            <!-- CLIENTE_ENDERECO -->
            <div>
                <x-input-label for="CLIENTE_ENDERECO" :value="__('Endereço')" />
                <x-text-input id="CLIENTE_ENDERECO" class="block mt-1 w-full" type="text" name="CLIENTE_ENDERECO" :value="old('CLIENTE_ENDERECO')" required />
                <x-input-error :messages="$errors->get('CLIENTE_ENDERECO')" class="mt-2" />
            </div>

            <!-- CLIENTE_CEP -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_CEP" :value="__('CEP')" />
                <x-text-input id="CLIENTE_CEP" class="block mt-1 w-full" type="text" name="CLIENTE_CEP" :value="old('CLIENTE_CEP')" required />
                <x-input-error :messages="$errors->get('CLIENTE_CEP')" class="mt-2" />
            </div>

            <!-- CLIENTE_CIDADE -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_CIDADE" :value="__('Cidade')" />
                <x-text-input id="CLIENTE_CIDADE" class="block mt-1 w-full" type="text" name="CLIENTE_CIDADE" :value="old('CLIENTE_CIDADE')" required />
                <x-input-error :messages="$errors->get('CLIENTE_CIDADE')" class="mt-2" />
            </div>

            <!-- CLIENTE_ESTADO -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_ESTADO" :value="__('Estado')" />
                <x-text-input id="CLIENTE_ESTADO" class="block mt-1 w-full" type="text" name="CLIENTE_ESTADO" :value="old('CLIENTE_ESTADO')" required />
                <x-input-error :messages="$errors->get('CLIENTE_ESTADO')" class="mt-2" />
            </div>

            <!-- CLIENTE_PAIS -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_PAIS" :value="__('País')" />
                <x-text-input id="CLIENTE_PAIS" class="block mt-1 w-full" type="text" name="CLIENTE_PAIS" :value="old('CLIENTE_PAIS')" required />
                <x-input-error :messages="$errors->get('CLIENTE_PAIS')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button type="button" class="ms-4" onclick="nextStep2()">
                    {{ __('Continuar') }}
                </x-primary-button>
            </div>
        </div>

        {{-- Etapa 3 - Informações --}}
        <div id="step-3" class="step" style="display: none;">
            <h1 class="text-white font_100 text-center" style="margin-bottom: 18px !important;">Informações Adicionais</h1>
            <!-- CLIENTE CPF -->
            <div>
                <x-input-label for="CLIENTE_CPF" :value="__('CPF')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="CLIENTE_CPF" :value="old('CLIENTE_CPF')" maxlength="14" required/>
                <x-input-error :messages="$errors->get('CLIENTE_CPF')" class="mt-2" />
            </div>
            <!-- CLIENTE TELEFONE -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_TEL" :value="__('TEL')" />
                <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="CLIENTE_TEL" :value="old('CLIENTE_TEL')" maxlength="15" placeholder="(XX) XXXXX-XXXX" required/>
                <x-input-error :messages="$errors->get('CLIENTE_TEL')" class="mt-2" />
            </div>
            <!-- CLIENTE DATA NASC -->
            <div class="mt-4">
                <x-input-label for="CLIENTE_DATA_NASC" :value="__('Data de Nascimento')" />
                <x-text-input id="CLIENTE_DATA_NASC" class="block mt-1 w-full" type="date" name="CLIENTE_DATA_NASC" :value="old('CLIENTE_DATA_NASC')" required />
                <x-input-error :messages="$errors->get('CLIENTE_DATA_NASC')" class="mt-2" />
            </div>
            <!-- CLIENTE DESCRIÇÃO -->
            <div class="mt-4">
                <x-input-label for="descricao_perfil" :value="__('Escreva algo sobre você!')" />
                <x-text-input id="descricao_perfil" class="block mt-1 w-full" type="text" name="descricao_perfil" :value="old('descricao_perfil')" required />
                <x-input-error :messages="$errors->get('descricao_perfil')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-primary-button type="button" class="ms-4" onclick="prevStep2()">
                    {{ __('Voltar') }}
                </x-primary-button>
                <x-primary-button class="ms-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>

<!-- Javascript para o MultiPágina -->
<script>
    function nextStep() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }
    function nextStep2() {
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-3').style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step-1').style.display = 'block';
        document.getElementById('step-2').style.display = 'none';
    }
    function prevStep2() {
        document.getElementById('step-2').style.display = 'block';
        document.getElementById('step-3').style.display = 'none';
    }
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
</script>