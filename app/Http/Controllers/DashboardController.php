<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalAttendance = Attendance::count();

        return view('dashboard', [
            'totalUser' => $totalUser,
            'totalAttendance' => $totalAttendance,
        ]);
    }
}