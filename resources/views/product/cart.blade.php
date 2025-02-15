@extends('layout.layout')

@section('title', 'Shopping Cart') 

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>

@if(session()->has('product'))
  
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
                        @if(Session::has('product'))
                        <tr>
                            <td>{{ session()->get('product')->name }}</td>
                            <td>

                                <img src="{{ asset('storage/uploads/images/'. session()->get('product')->image) }}" alt="" style=" width:90px; height:90px;">
                            </td>
                            <td>{{ session()->get('product')->price }}</td>

                        </tr>
                        @endif
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
