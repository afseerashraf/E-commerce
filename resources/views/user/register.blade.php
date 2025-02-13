@extends('layout.layout')

@section('title', 'User Register')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-3">User Registration</h3>

        <div class="text-center mb-3">
            <a href="{{ route('user.viewLogin') }}" class="text-decoration-none">Already have an account? Login here</a>
        </div>

        <form action="{{ route('user.register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>

@endsection
