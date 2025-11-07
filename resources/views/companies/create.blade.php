@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
    <h1>Create Company</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf
                @include('companies.partials.form')
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
