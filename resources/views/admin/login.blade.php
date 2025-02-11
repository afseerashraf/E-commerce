@extends('layout.layout')

@section('title', 'Admin Login')

@section('content')

<style>
    body {
        background: linear-gradient(to right, #ff9a9e, #fad0c4);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 420px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .login-container h3 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: 600;
        color: #333;
    }

    .login-container a {
        display: block;
        text-align: center;
        margin-bottom: 15px;
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .login-container a:hover {
        text-decoration: underline;
    }

    .btn-custom {
        background: #ff6b81;
        border: none;
        color: white;
        font-size: 16px;
        padding: 10px;
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-custom:hover {
        background: #ff4757;
    }
</style>

<div class="container">
    <div class="login-container">
        <h3>Admin Login</h3>

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a href="{{ route('admin.viewRegister') }}">No account? Register here</a>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
