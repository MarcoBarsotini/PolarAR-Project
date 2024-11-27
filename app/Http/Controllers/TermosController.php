<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermosController extends Controller {
    public function termos_servico() {
        return view('docs.termos_servico');
    }
    public function politica_privacidade() {
        return view('docs.politica_privacidade');
    }
}