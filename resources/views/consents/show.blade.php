@extends('adminlte::page')

@section('title', 'Ver Consentimento')

@section('content_header')
    <h1>Ver Consentimento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{ $consent->title }}</h3>
            <p><strong>Empresa:</strong> {{ $consent->company->name ?? '-' }}</p>
            <p><strong>Vigência:</strong> {{ optional($consent->effective_date)->format('Y-m-d') ?? '-' }}</p>
            <hr>
            <div>{!! nl2br(e($consent->content)) !!}</div>
        </div>
        <div class="card-footer">
            <a href="{{ route('consents.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('consents.edit', $consent) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
@stop
