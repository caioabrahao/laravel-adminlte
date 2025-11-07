@extends('adminlte::page')

@section('title', 'Alterar Senha')

@section('content_header')
    <h1>Alterar Senha</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                <div class="form-group mb-3">
                    <label>Senha Atual</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nova Senha</label>
                    <input type="password" name="new_password" class="form-control">
                    @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Confirmar Nova Senha</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>

                <button class="btn btn-primary">Alterar Senha</button>
            </form>
        </div>
    </div>
@stop
