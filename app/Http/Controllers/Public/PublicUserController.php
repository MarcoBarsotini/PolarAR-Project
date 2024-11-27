<?php

namespace App\Http\Controllers\Public;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PublicUserController extends Controller {
    public function show($id) {
        $user = User::findOrFail($id);
        return view('public_info.showProfile', compact('user'));
    }
}