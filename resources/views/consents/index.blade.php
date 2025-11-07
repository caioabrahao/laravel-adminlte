@extends('adminlte::page')

@section('title', 'Termos de Consentimento')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Termos de Consentimento</h1>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Empresa</th>
                        <th>Vigência</th>
                        <th>Criado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consents as $consent)
                        <tr>
                            <td>{{ $consent->id }}</td>
                            <td>{{ $consent->title }}</td>
                            <td>{{ $consent->company->name ?? '-' }}</td>
                            <td>{{ optional($consent->effective_date)->format('Y-m-d') }}</td>
                            <td>{{ $consent->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('consents.show', $consent) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('companies.consents.edit', [$consent->company_id, $consent]) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('companies.consents.destroy', [$consent->company_id, $consent]) }}" method="POST" style="display:inline;">
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
        <div class="card-footer">
            {{ $consents->links() }}
        </div>
    </div>
@stop
