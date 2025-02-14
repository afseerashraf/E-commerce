@extends('layout.layout')

@section('title', 'Shopping Cart')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>

@if(session('product'))
  
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>{{ session('product')->name }}</strong></td>
                            <td><img src="{{ asset('storage/uploads/images/' . Session('product')->image) }}" width="60" height="60" class="rounded shadow-sm"></td>
                            <td>${{ number_format(session('product')->price, 2) }}</td>
                            <td>
                               
                            </td>
                            <td>
                                <form action="{{ route('products.cartRemove', encrypt(session('product')->id ) ) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">❌</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
    @else
    <div class="alert alert-warning text-center">
        <h4>Your cart is empty! 🛒</h4>
        <a href="{{ route('products.home') }}" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
    @endif
</div>

@endsection
