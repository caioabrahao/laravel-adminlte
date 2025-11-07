@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Admin Dashboard</h1>
        <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Back to site</a>
    </div>
@stop

@section('content')

@php
    // Safe fallbacks so this view renders even if controller doesn't supply data.
    $stats = $stats ?? ['users' => 124, 'companies' => 37, 'active' => 102, 'reports' => 12];

    $companies = $companies ?? collect([
        (object)['id' => 1, 'name' => 'Acme Ltd', 'cnpj' => '12.345.678/0001-99', 'created_at' => '2025-11-06'],
        (object)['id' => 2, 'name' => 'Beta SA',  'cnpj' => '98.765.432/0001-11', 'created_at' => '2025-10-21'],
        (object)['id' => 3, 'name' => 'Gamma LLC','cnpj' => '11.222.333/0001-44', 'created_at' => '2025-09-12'],
    ]);

    $recent_users = $recent_users ?? collect([
        (object)['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'created_at' => '2025-11-05'],
        (object)['name' => 'Bob Santos', 'email' => 'bob@example.com', 'created_at' => '2025-11-03'],
        (object)['name' => 'Carla M.', 'email' => 'carla@example.com', 'created_at' => '2025-10-30'],
    ]);
@endphp

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $stats['users'] }}</h3>
                <p>Users</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="#" class="small-box-footer">Manage users <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $stats['companies'] }}</h3>
                <p>Companies</p>
            </div>
            <div class="icon"><i class="fas fa-building"></i></div>
            <a href="{{ route('companies.index') }}" class="small-box-footer">Manage companies <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $stats['active'] }}</h3>
                <p>Active users</p>
            </div>
            <div class="icon"><i class="fas fa-user-check"></i></div>
            <a href="#" class="small-box-footer">View active <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $stats['reports'] }}</h3>
                <p>Reports</p>
            </div>
            <div class="icon"><i class="fas fa-file-alt"></i></div>
            <a href="#" class="small-box-footer">View reports <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Recent companies</h3>
                <div class="card-tools">
                    <a href="{{ route('companies.index') }}" class="btn btn-tool">See all</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>CNPJ</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->cnpj }}</td>
                                <td>{{ $company->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent users</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($recent_users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $user->name }}</strong>
                                <div class="text-muted small">{{ $user->email }}</div>
                            </div>
                            <span class="badge badge-primary">{{ $user->created_at }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick actions</h3>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary btn-block mb-2">Create company</a>
                <a href="#" class="btn btn-outline-secondary btn-block">Export users</a>
            </div>
        </div>
    </div>
</div>

@stop
