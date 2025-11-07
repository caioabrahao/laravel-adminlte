<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companiesCount = \App\Models\Company::count();
        return view('admin.dashboard', compact('companiesCount'));
    }
}
