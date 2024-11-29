<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarFuncionarioVendedor {
    public function handle(Request $request, Closure $next) {
        if (auth()->check() && auth()->user()->user_type == 'funcionario' && auth()->user()->user_class == 'vendedor') {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    }
}