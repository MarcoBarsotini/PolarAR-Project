<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller {
    public function index(Request $request) {
        $searchName = $request->input('search_name');
        $searchId = $request->input('search_id');

        $users = User::query()
            ->when($searchName, function ($query) use ($searchName) {
                return $query->where('name', 'LIKE', "%{$searchName}%");
            })
            ->when($searchId, function ($query) use ($searchId) {
                return $query->where('id', $searchId);
            })
            ->paginate(10);

        return view('admin.users.index', compact('users', 'searchName', 'searchId'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {

        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'user_type' => 'required|string|in:cliente,funcionario',
            'user_class' => 'required|string|in:nada,manutencao,vendedor',
            'CLIENTE_DATA_NASC' => 'required|date_format:d/m/Y',
            'CLIENTE_TEL' => 'required|string|max:16|unique:users,CLIENTE_TEL,' . $id,
            'CLIENTE_CPF' => 'required|string|max:14|unique:users,CLIENTE_CPF,' . $id,
        ], [
            'CLIENTE_TEL.unique' => 'O Telefone informado já está em uso por outro Usuário.',
            'CLIENTE_CPF.unique' => 'O CPF informado já está em uso por outro Usuário.',
            'CLIENTE_DATA_NASC.date_format' => 'A Data de Nascimento deve estar no formato DD/MM/AAAA.',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        $user->user_class = $request->input('user_class');
        $user->CLIENTE_DATA_NASC = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('CLIENTE_DATA_NASC'))->format('Y-m-d');
        $user->CLIENTE_TEL = $request->input('CLIENTE_TEL');
        $user->CLIENTE_CPF = $request->input('CLIENTE_CPF');
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}