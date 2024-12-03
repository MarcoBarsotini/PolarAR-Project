<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|string|in:cliente,funcionario',
            'user_class' => 'required|string|max:40',
            'descricao_perfil' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'user_class' => $request->user_class,
            'descricao_perfil' => $request->descricao_perfil,
        ]);

        return redirect()->route('usuarios.create')->with('success', 'Usuário criado com sucesso.');
    }

    public function index() {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }
}
