@extends('layout.layout')

@section('title', 'Admin Register')

@section('content')

<style>
    .register-container {
        padding: 40px;
        background: #ffffff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        width: 100%;
        max-width: 450px;
        margin: 50px auto;
    }

    .register-header {
        text-align: center;
        font-weight: bold;
        font-size: 22px;
        margin-bottom: 20px;
        color: #333;
    }

    .register-container form {
        padding: 10px;
    }

    .register-container .form-control {
        border-radius: 8px;
    }

    .register-container a {
        display: block;
        text-align: center;
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
        margin-bottom: 15px;
    }

    .register-container a:hover {
        text-decoration: underline;
    }

    .btn-register {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        padding: 10px;
        transition: 0.3s;
    }

    .btn-register:hover {
        background: linear-gradient(135deg, #0056b3, #004494);
    }

    .alert-danger {
        font-size: 14px;
        padding: 5px;
        margin-top: 5px;
    }
</style>

<div class="container">
    <div class="register-container">
        <div class="register-header">Admin Registration</div>
        
        <a href="{{ route('admin.viewLogin') }}">Already have an account? Login here</a>

        <form action="{{ route('admin.register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-register">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
