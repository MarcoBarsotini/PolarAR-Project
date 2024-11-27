<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CatalogoController extends Controller {
    public function index(Request $request) {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $query = User::where('user_type', 'funcionario');

        if ($filter) {
            $query->where('user_class', $filter);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        $funcionarios = $query->paginate(8);

        return view('catalogo.index', compact('funcionarios'));
    }
}