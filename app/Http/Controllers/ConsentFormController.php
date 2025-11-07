<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsentFormRequest;
use App\Models\Company;
use App\Models\ConsentForm;
use Illuminate\Http\Request;

class ConsentFormController extends Controller
{
    public function create(Company $company)
    {
        return view('consents.create', compact('company'));
    }

    public function store(StoreConsentFormRequest $request, Company $company)
    {
        $data = $request->validated();
        $data['company_id'] = $company->id;
        ConsentForm::create($data);

        return redirect()->route('company.dashboard', $company->id)
            ->with('success', 'Consentimento criado com sucesso.');
    }

    public function edit(Company $company, ConsentForm $consent)
    {
        // ensure the consent belongs to the company
        if ($consent->company_id !== $company->id) abort(404);
        return view('consents.edit', compact('company', 'consent'));
    }

    public function update(StoreConsentFormRequest $request, Company $company, ConsentForm $consent)
    {
        if ($consent->company_id !== $company->id) abort(404);
        $consent->update($request->validated());
        return redirect()->route('company.dashboard', $company->id)
            ->with('success', 'Consentimento atualizado com sucesso.');
    }

    public function destroy(Company $company, ConsentForm $consent)
    {
        if ($consent->company_id !== $company->id) abort(404);
        $consent->delete();
        return redirect()->route('company.dashboard', $company->id)
            ->with('success', 'Consentimento removido com sucesso.');
    }
}
