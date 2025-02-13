@extends('layout.layout')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Your Orders</h2>
@if(session()->has('success'))
 <p>{{ Session::get('success') }}</p>
@endif
    <div class="row justify-content-center">
        @if ($user->orders->isEmpty())
            <div class="col-md-6">
                <div class="alert alert-warning text-center shadow-sm">
                    <strong>No orders found.</strong> Start shopping now!
                </div>
            </div>
        @else
            @foreach ($user->orders as $order)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('storage/uploads/images/' . $order->product->image) }}" class="img-fluid rounded mb-3" alt="{{ $order->product->name }}" style="max-height: 200px; object-fit: cover;">
                            </div>
                            <h5 class="card-title">{{ $order->product->name }}</h5>
                            <p class="card-text"><strong>Description:</strong> {{ $order->product->description }}</p>
                            <p class="card-text"><strong>Ordered Date:</strong> {{ $order->date }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
