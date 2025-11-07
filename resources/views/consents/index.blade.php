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

    <div class="card mb-3">
        <div class="card-body">
            <h5>Adicionar Consentimento (rápido)</h5>
            <form method="POST" action="{{ route('consents.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Empresa</label>
                            <select name="company_id" class="form-control">
                                <option value="">Escolha uma empresa</option>
                                @foreach($companies as $c)
                                    <option value="{{ $c->id }}" {{ old('company_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Vigência</label>
                            <input type="date" name="effective_date" class="form-control" value="{{ old('effective_date') }}">
                            @error('effective_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label>Conteúdo (opcional)</label>
                    <textarea name="content" class="form-control" rows="2">{{ old('content') }}</textarea>
                </div>
            </form>
        </div>
    </div>

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
        <div class="card-footer">
            {{ $consents->links() }}
        </div>
    </div>
@stop
