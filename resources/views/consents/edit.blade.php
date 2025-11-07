@extends('adminlte::page')

@section('title', "Editar Consentimento - {{ $company->name }}")

@section('content_header')
    <h1>Editar Consentimento - {{ $company->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('consents.update', $consent) }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $consent->title) }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Conteúdo</label>
                    <textarea name="content" class="form-control" rows="6">{{ old('content', $consent->content) }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Data de Vigência</label>
                    <input type="date" name="effective_date" class="form-control" value="{{ old('effective_date', optional($consent->effective_date)->format('Y-m-d')) }}">
                    @error('effective_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('company.dashboard', $company->id) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
