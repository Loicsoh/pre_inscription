<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilStatut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $inscriptionCount = CivilStatut::count();
        $latestUsers = CivilStatut::with('user')->latest()->take(8)->get();

        return view('admin.dashboard', compact('userCount', 'inscriptionCount', 'latestUsers'));
    }
}