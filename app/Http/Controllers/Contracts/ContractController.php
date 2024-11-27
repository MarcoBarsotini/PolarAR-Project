<?php

namespace App\Http\Controllers\Contracts;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'funcionario_id' => 'required|exists:users,id',
            'descricao_servico' => 'required|string|max:255',
        ]);

        $contractor_id = auth()->user()->id;

        Contract::create([
            'contractor_id' => $contractor_id,
            'contracted_id' => $request->funcionario_id,
            'descricao_servico' => $request->descricao_servico,
        ]);

        return redirect()->route('catalogo.index')->with('success', 'Contrato criado com sucesso.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:aceito,rejeitado',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->status = $request->status;
        $contract->save();

        return redirect()->back()->with('success', 'Contrato atualizado com sucesso.');
    }

    public function finalizar($id) {
        $contract = Contract::findOrFail($id);

        if ($contract->contracted_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Você não tem permissão para finalizar este contrato.');
        }

        $contract->status = 'finalizado';
        $contract->save();

        return redirect()->back()->with('success', 'Contrato finalizado com sucesso.');
    }

    public function index() {
        $contracts = Contract::with('contractor', 'contracted')
            ->where('contractor_id', auth()->id())
            ->get();

        return view('contracts.index', compact('contracts'));
    }

    public function show(Contract $contract) {
        if ($contract->contractor_id !== auth()->id() && auth()->user()->user_isAdmin !== 'true') {
            abort(403);
        }

        return view('contracts.show', compact('contract'));
    }

    public function showRequestedContracts(Request $request) {
        $user = auth()->user();
        $requestedContracts = $user->requestedContracts()
            ->when($request->input('search'), function ($query) use ($request) {
                $query->where('descricao_servico', 'like', '%' . $request->input('search') . '%');
            })
            ->paginate(10);

        return view('contracts.solicitados', [
            'requestedContracts' => $requestedContracts,
            'search' => $request->input('search'),
        ]);
    }

    public function showAcceptedContracts(Request $request) {
        $user = auth()->user();
        $acceptedContracts = $user->allContracts()
            ->when($request->input('search'), function($query, $search) {
                $query->whereHas('contractor', function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->when($request->input('status'), function($query, $status) {
                if (in_array($status, ['aceito', 'rejeitado', 'finalizado'])) {
                    $query->where('status', $status);
                }
            })
            ->paginate(10);

        return view('contracts.aceitos', compact('acceptedContracts'));
    }

    public function adminIndex() {
        $contracts = Contract::with('contractor', 'contracted')->get();

        return view('admin.contracts.index', compact('contracts'));
    }

    public function destroy($id) {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect()->back()->with('success', 'Contrato excluído com sucesso!');
    }
}
