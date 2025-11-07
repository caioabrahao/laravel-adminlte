@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.update', $company) }}" method="POST">
                @csrf
                @method('PUT')
                @include('companies.partials.form', ['company' => $company])
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
