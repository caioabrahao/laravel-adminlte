<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsentForm;

class ConsentFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consents = [
            [
                'company_id' => 1,
                'title' => 'Política de Privacidade - Acme Ltd',
                'content' => "Nós coletamos dados pessoais para prestação de serviços. Este documento descreve como tratamos os dados.",
                'effective_date' => '2025-01-01',
            ],
            [
                'company_id' => 2,
                'title' => 'Termo de Consentimento - Beta SA',
                'content' => "Ao concordar, você autoriza o uso de seus dados para fins administrativos e operacionais.",
                'effective_date' => '2025-03-01',
            ],
            [
                'company_id' => 3,
                'title' => 'Consentimento de Marketing - Gamma LLC',
                'content' => "Autorizo o envio de comunicações comerciais e newsletters.",
                'effective_date' => '2025-05-10',
            ],
            [
                'company_id' => 4,
                'title' => 'Termos de Uso - Delta Comércio',
                'content' => "Regras e condições para utilização dos serviços prestados pela Delta Comércio.",
                'effective_date' => '2025-06-15',
            ],
        ];

        foreach ($consents as $data) {
            ConsentForm::updateOrCreate([
                'company_id' => $data['company_id'],
                'title' => $data['title'],
            ], $data);
        }
    }
}
