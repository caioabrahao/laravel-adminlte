@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>Change Password</h1>
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
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control">
                    @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>

                <button class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
@stop
