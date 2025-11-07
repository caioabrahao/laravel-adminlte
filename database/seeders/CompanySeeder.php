<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Acme Ltd',
                'cnpj' => '12345678000199',
                'responsible_name' => 'João Silva',
                'email' => 'contato@acme.local',
                'phone' => '+55 11 4002-8922',
                'address' => 'Av. Paulista, 1000, São Paulo, SP',
            ],
            [
                'name' => 'Beta SA',
                'cnpj' => '98765432000111',
                'responsible_name' => 'Mariana Costa',
                'email' => 'hello@beta.local',
                'phone' => '+55 21 3003-1234',
                'address' => 'R. das Flores, 200, Rio de Janeiro, RJ',
            ],
            [
                'name' => 'Gamma LLC',
                'cnpj' => '11222333000144',
                'responsible_name' => 'Carlos Pereira',
                'email' => 'info@gamma.local',
                'phone' => '+55 31 3333-4444',
                'address' => 'Av. Afonso Pena, 500, Belo Horizonte, MG',
            ],
            [
                'name' => 'Delta Comércio',
                'cnpj' => '55443322000166',
                'responsible_name' => 'Fernanda Lima',
                'email' => 'contato@delta.local',
                'phone' => '+55 41 2222-3333',
                'address' => 'Rua XV de Novembro, 300, Curitiba, PR',
            ],
        ];

        foreach ($companies as $data) {
            // store CNPJ only digits (normalize)
            $data['cnpj'] = preg_replace('/\D/', '', $data['cnpj']);
            Company::updateOrCreate(['cnpj' => $data['cnpj']], $data);
        }
    }
}
