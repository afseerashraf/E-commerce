<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .btn-primary, .btn-success {
            width: 100%;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-primary:hover, .btn-success:hover, .btn-danger:hover {
            opacity: 0.9;
        }
        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 500;
        }
        .container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">E-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('order.show', encrypt(Auth::id())) }}">Orders</a></li>
                    <li class="nav-item">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-4">
        <!-- Electronics Section -->
        @if(isset($electronics) && $electronics->isNotEmpty())
            <h2 class="mb-4">Electronics</h2>
            <div class="row g-4">
                @foreach($electronics as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="{{ asset('storage/uploads/images/' . $product->image) }}" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">${{ $product->price }}</p>
                                <a href="{{ route('products.cart', encrypt($product->id)) }}" class="btn btn-primary">Add to Cart</a>
                                <a href="{{ route('products.showOrder', [encrypt(Auth::id()), encrypt($product->id)]) }}" class="btn btn-success">Place Order</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Cosmetics Section -->
        @if(isset($cosmetics) && $cosmetics->isNotEmpty())
            <h2 class="mt-5 mb-4">Cosmetics</h2>
            <div class="row g-4">
                @foreach($cosmetics as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="{{ asset('storage/uploads/images/' . $product->image) }}" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">${{ $product->price }}</p>
                                <a href="{{ route('products.cart', encrypt($product->id)) }}" class="btn btn-primary">Add to Cart</a>
                                <a href="{{ route('products.showOrder', [encrypt(Auth::id()), encrypt($product->id)]) }}" class="btn btn-success">Place Order</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Clothing Section -->
        @if(isset($clothes) && $clothes->isNotEmpty())
            <h2 class="mt-5 mb-4">Clothing</h2>
            <div class="row g-4">
                @foreach($clothes as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                        <img src="{{ asset('storage/uploads/images/' . $product->image) }}" class="card-img-top" alt="Product">
                        <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">${{ $product->price }}</p>
                                <a href="{{ route('products.cart', encrypt($product->id)) }}" class="btn btn-primary">Add to Cart</a>
                                <a href="{{ route('products.showOrder', [encrypt(Auth::id()), encrypt($product->id)]) }}" class="btn btn-success">Place Order</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>