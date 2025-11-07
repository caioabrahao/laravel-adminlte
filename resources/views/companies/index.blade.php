@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">+ Add Company</a>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->cnpj }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
@stop
