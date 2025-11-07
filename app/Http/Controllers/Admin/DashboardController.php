<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch real data for the dashboard
        $companies = Company::orderBy('created_at', 'desc')->limit(10)->get();

        $recent_users = User::orderBy('created_at', 'desc')->limit(5)->get(['name', 'email', 'created_at']);

        $stats = [
            'users' => User::count(),
            'companies' => Company::count(),
            // these features are not implemented yet — show a 'Soon' label
            'active' => 'Soon',
            'reports' => 'Soon',
        ];

        return view('admin.dashboard', compact('companies', 'recent_users', 'stats'));
    }
}
