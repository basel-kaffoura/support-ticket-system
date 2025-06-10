@extends('layouts.app')

@section('title', 'Login Page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Administration Login</h4>
                </div>
                <div class="card-body">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <small class="text-muted">
                            Admin account: basel@admin.com / admin12345
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
