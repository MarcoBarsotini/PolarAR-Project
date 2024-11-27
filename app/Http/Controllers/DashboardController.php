<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    public function index() {
        $user = Auth::user();
        $contracts = Contract::where('contracted_id', $user->id)
                             ->where('status', 'pendente')
                             ->get();

        return view('dashboard', compact('user', 'contracts'));
    }
}