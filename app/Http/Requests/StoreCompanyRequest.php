<?php

namespace App\Http\Requests;

use App\Rules\ValidCnpj;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; #no auth yet..
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // for update requests, ignore the current company id in unique rule
        $uniqueCnpj = Rule::unique('companies', 'cnpj');
        if ($this->route('company') instanceof \App\Models\Company) {
            $uniqueCnpj->ignore($this->route('company')->id);
        }

        return [
            'name' => 'required|string|max:255',
            'cnpj' => ['required', 'string', 'max:18', $uniqueCnpj, new ValidCnpj()],
            'responsible_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ];
    }
}
