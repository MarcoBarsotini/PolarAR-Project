<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminDashboardController extends Controller {
    public function index() {
        $user = Auth::user();

        $userStats = User::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        return view('admin.dashboard', compact('user', 'userStats'));
    }
}