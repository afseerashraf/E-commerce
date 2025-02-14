@extends('layout.adminLayout')

@section('title', 'Orders')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4 text-center">Customer Orders</h3>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table id="ordersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><strong>{{ $order->customer->name }}</strong></td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
