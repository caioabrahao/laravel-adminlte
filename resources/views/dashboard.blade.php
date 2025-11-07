@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Painel</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $companiesCount }}</h3>
                    <p>Empresas Registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="{{ route('companies.index') }}" class="small-box-footer">
                    Gerenciar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@stop
