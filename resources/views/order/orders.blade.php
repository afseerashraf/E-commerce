@extends('layout.adminLayout')

@section('title', 'Orders')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4 text-center">Customer Orders</h3>
    
    <div class="card shadow-sm p-4 bg-dark text-white">
        <div class="table-responsive">
            <table id="ordersTable" class="table table-hover table-bordered table-dark">
                <thead class="thead-light">
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
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTables  -->


@endsection
