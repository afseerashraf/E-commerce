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
            font-family: 'Poppins', sans-serif;
        }

        /* Dark Navbar */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #343a40; /* Dark background */
            height: 66px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff !important; /* White text */
            height: 97px;
        }

        .nav-link {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8) !important; /* Light text */
            height:97px;
        }

        .nav-link:hover {
            color: #ffffff !important; /* White text on hover */
        }

        .btn-logout {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .container {
            padding-top: 80px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Compact Card Design */
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 150px; /* Smaller image height */
            object-fit: cover;
        }

        .card-body {
            padding: 15px; /* Reduced padding */
            text-align: center;
        }

        .card-title {
            font-size: 1.1rem; /* Smaller font size */
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }

        .card-text {
            color: #6c757d;
            font-size: 0.9rem; /* Smaller font size */
            margin-bottom: 10px;
        }

        .btn-primary, .btn-success {
            width: 100%;
            margin-top: 10px;
            padding: 8px; /* Smaller padding */
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s;
            font-size: 0.9rem; /* Smaller font size */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px; /* Reduced margin */
            font-size: 1.75rem; /* Smaller font size */
            font-weight: bold;
            color: #343a40;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Dark Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
                        <a href="{{ route('user.logout') }}" class="btn btn-logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Electronics Section -->
        @if(isset($electronics) && $electronics->isNotEmpty())
            <h2 class="section-title">Electronics</h2>
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
            <h2 class="section-title mt-5">Cosmetics</h2>
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
            <h2 class="section-title mt-5">Clothing</h2>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 E-Shop. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>