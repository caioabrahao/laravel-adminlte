<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyHubController extends Controller
{
     public function dashboard($id)
    {
        $company = Company::with('consentForms')->findOrFail($id);

        return view('company.hub', compact('company'));
    }
}
