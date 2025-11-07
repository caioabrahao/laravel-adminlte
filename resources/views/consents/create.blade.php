@extends('adminlte::page')

@section('title', "Criar Consentimento - {{ $company->name }}")

@section('content_header')
    <h1>Criar Consentimento - {{ $company->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('companies.consents.store', $company) }}">
                @csrf

                <div class="form-group mb-3">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Conteúdo</label>
                    <textarea name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Data de Vigência</label>
                    <input type="date" name="effective_date" class="form-control" value="{{ old('effective_date') }}">
                    @error('effective_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('company.dashboard', $company->id) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
