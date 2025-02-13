@extends('layout.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Product Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $product->name }}</h4>
            <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        </div>
    </div>

    <h3 class="mt-4">Place Your Order</h3>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="customer_id" value="{{ encrypt($user->id) }}">
        <input type="hidden" name="product_id" value="{{ encrypt($product->id) }}">

       
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="you'r name" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="+91" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit Order</button>
    </form>
</div>
@endsection
