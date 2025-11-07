@extends('adminlte::page')

@section('title', "Super DPO - {$company->name}")

@section('content_header')
    <h1>{{ $company->name }} - Painel da Empresa</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-body">
                <h4>Informações da Empresa</h4>
                <p><strong>Setor:</strong> {{ $company->sector }}</p>
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>CNPJ:</strong> {{ $company->cnpj }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Gráfico de Atividade</div>
            <div class="card-body">
                <canvas id="companyChart"></canvas>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('companyChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Documentos', 'Usuários', 'Tarefas', 'Relatórios'],
        datasets: [{
            label: 'Atividade',
            data: [12, 19, 7, 5], // you can replace this with dynamic data later
        }]
    },
});
</script>
@stop
