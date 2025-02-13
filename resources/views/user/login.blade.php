@extends('layout.layout')

@section('title', 'User Login')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-3">User Login</h3>

        @if (Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <form action="{{ route('user.login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('user.viewRegister') }}" class="text-decoration-none">No account? Register here</a>
        </div>
    </div>
</div>

@endsection
