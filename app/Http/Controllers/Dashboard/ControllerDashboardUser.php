<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;

class ControllerDashboardUser
{
    public function index()
    {
        $user = Auth::user();

        return view('petugas.dashboard.petugas', compact('user'));
    }
}
