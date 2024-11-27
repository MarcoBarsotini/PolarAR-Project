<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller {
    public function create(): View {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'descricao_perfil' => ['required', 'string', 'max:355'],
            'CLIENTE_DATA_NASC' => ['required', 'date', 'before:today'],
            'CLIENTE_TEL' => ['required', 'string', 'max:15', 'unique:users,CLIENTE_TEL'],
            'CLIENTE_CPF' => ['required', 'string', 'max:14', 'unique:users,CLIENTE_CPF'],
            'CLIENTE_ENDERECO' => ['required', 'string', 'max:255'],
            'CLIENTE_CEP' => ['required', 'string', 'max:20'],
            'CLIENTE_CIDADE' => ['required', 'string', 'max:255'],
            'CLIENTE_ESTADO' => ['required', 'string', 'max:255'],
            'CLIENTE_PAIS' => ['required', 'string', 'max:255'],
        ], [
            'CLIENTE_TEL.unique' => 'O número de Telefone informado já está em uso.',
            'CLIENTE_CPF.unique' => 'O CPF informado já está em uso.',
            'CLIENTE_DATA_NASC.required' => 'A data de nascimento é obrigatória.',
            'CLIENTE_DATA_NASC.before' => 'A data de nascimento deve ser anterior à data de hoje.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'descricao_perfil' => $request->descricao_perfil,
            'user_rating' => 0,
            'user_type' => $request->user_type,
            'CLIENTE_DATA_NASC' => $request->input('CLIENTE_DATA_NASC'),
            'CLIENTE_TEL' => $request->CLIENTE_TEL,
            'CLIENTE_CPF' => $request->CLIENTE_CPF,
            'CLIENTE_ENDERECO' => $request->CLIENTE_ENDERECO,
            'CLIENTE_CEP' => $request->CLIENTE_CEP,
            'CLIENTE_CIDADE' => $request->CLIENTE_CIDADE,
            'CLIENTE_ESTADO' => $request->CLIENTE_ESTADO,
            'CLIENTE_PAIS' => $request->CLIENTE_PAIS,
            'CLIENTE_IP' => request()->ip(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}