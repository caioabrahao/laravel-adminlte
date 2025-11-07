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
        <div class="card">
            <div class="card-header p-0">
                <ul class="nav nav-tabs" id="companyTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab">Visão Geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="consents-tab" data-toggle="tab" href="#consents" role="tab">Termos de Consentimento</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">Gráfico de Atividade</div>
                        <div class="card-body">
                            <canvas id="companyChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="consents" role="tabpanel">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Termos de Consentimento</h5>
                        <a href="{{ route('companies.consents.create', $company) }}" class="btn btn-sm btn-primary">Adicionar Consentimento</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($company->consentForms->isEmpty())
                        <div class="alert alert-info">Nenhum termo de consentimento cadastrado.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Vigência</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($company->consentForms as $consent)
                                        <tr>
                                            <td>{{ $consent->title }}</td>
                                            <td>{{ optional($consent->effective_date)->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('consents.edit', $consent) }}" class="btn btn-sm btn-warning">Editar</a>
                                                <form action="{{ route('consents.destroy', $consent) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Remover este consentimento?')">Remover</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
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
