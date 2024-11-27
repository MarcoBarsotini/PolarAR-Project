<style>
    .profile-container {
        display: flex;
        gap: 100px !important;
    }
    .image-container {
        width: 150px;
        height: 150px;
        overflow: hidden;
    }
    .profile-form, .profile-photo-form {
        background-color: #1f2937;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        flex: 1;
        min-width: 400px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .upload-label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .upload-input {
        display: none;
    }
    .file-name {
        margin-top: 5px;
        font-size: 14px;
        color: white;
    }
    .profile {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid white;
    }
    .profile-photo-form {
        text-align: center;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .button {
        background-color: #2052f7 !important;
        border: 1px solid #2052f7 !important;
    }
</style>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Detalhes do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Atualize as informações da sua conta.") }}
        </p>
    </header>

    <div class="profile-container">
        <form method="post" action="{{ route('profile.update') }}" class="profile-form mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="form-group">
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Seu Email não foi verificado.') }}

                            <button form="send-verification" class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none">
                                {{ __('Clique aqui para enviar a re-confirmação de Email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('Um novo link de confirmação foi Enviado para seu Email.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button class="button">{{ __('Salvar') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Salvo.') }}</p>
                @endif
            </div>
        </form>

        <div class="profile-photo-form">
            <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <h1 class="text-white text-center font_110" style="margin-bottom: 10px !important;">Altere sua foto de perfil</h1>
                    <label for="profile_photo" class="cursor-pointer">
                        @if (Auth::user()->profile_photo)
                            <img src="{{ Storage::url(Auth::user()->profile_photo) }}" class="profile" alt="Foto de Perfil" width="150">
                        @else
                            <img src="{{ asset('images/default_profile.png') }}" class="profile" alt="Foto de Perfil Padrão" width="150">
                        @endif
                    </label>
                </div>
                <div class="form-group">
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="upload-input hidden" onchange="displayImageName(this)">
                    <span id="file-name" class="file-name"></span>
                </div>
                <button type="submit" class="glow-on-hover">Salvar Foto</button>
            </form>
        </div>
    </div>
</section>

<script>
    function displayImageName(input) {
        const fileNameSpan = document.getElementById('file-name');
        if (input.files && input.files[0]) {
            fileNameSpan.textContent = input.files[0].name;
        } else {
            fileNameSpan.textContent = '';
        }
    }
</script>