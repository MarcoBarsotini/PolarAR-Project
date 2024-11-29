<?php

namespace App\Http\Controllers\Ordens;

use App\Models\OrdemDeServico;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller {

    public function index() {
        $ordens = OrdemDeServico::orderBy('created_at', 'desc')->get();

        return view('ordem_de_servico.index', compact('ordens'));
    }

    public function show($id) {
        $ordem = OrdemDeServico::findOrFail($id);

        return view('ordem_de_servico.show', compact('ordem'));
    }

    public function create() {
        $clientes = User::where('user_type', 'cliente')->get();

        return view('ordem_de_servico.create', compact('clientes'));
    }

    public function store(Request $request) {
        $request->validate([
            'OS_IDENTIFICACAO' => 'required|string|max:255',
            'OS_TIPO' => 'required|string|max:255',
            'OS_DATA_PREVISAO' => 'required|date',
            'cliente_id' => 'required|exists:users,id',
        ]);

        $funcionarioResponsavel = auth()->user();

        OrdemDeServico::create([
            'OS_IDENTIFICACAO' => $request->OS_IDENTIFICACAO,
            'OS_TIPO' => $request->OS_TIPO,
            'OS_DATA_ENTRADA' => now(),
            'OS_CLITENTE_RESPONSAVEL' => User::find($request->cliente_id)->name,
            'OS_FUNCIONARIO_RESPONSAVEL' => $funcionarioResponsavel->name,
            'OS_DATA_PREVISAO' => $request->OS_DATA_PREVISAO,
        ]);

        return redirect()->route('ordem.index')->with('success', 'Ordem de serviço criada com sucesso.');
    }
}
