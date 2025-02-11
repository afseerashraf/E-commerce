<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                    <li class="nav-item">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- Navbar -->

    <div class="container mt-4">
        <!-- Electronics Section -->
        @if($electronics->isNotEmpty())
            <h2 class="mb-3">Electronics</h2>
            <div class="row g-4">
                @foreach($electronics as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ $product->price }}</p>
                                <button class="btn btn-primary">Add to Cart</button>
                                <a href="{{ route('order.order', encrypt($product->id)) }}" class="btn btn-success">Place Order</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Cosmetics Section -->
        @if($cosmetics->isNotEmpty())
            <h2 class="mt-5 mb-3">Cosmetics</h2>
            <div class="row g-4">
                @foreach($cosmetics as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ $product->price }}</p>
                                <button class="btn btn-primary">Add to Cart</button>
                                <button class="btn btn-success">Place Order</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Clothing Section -->
        @if($clothes->isNotEmpty())
            <h2 class="mt-5 mb-3">Clothing</h2>
            <div class="row g-4">
                @foreach($clothes as $product)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ $product->price }}</p>
                                <button class="btn btn-primary">Add to Cart</button>
                                <button class="btn btn-success">Place Order</button>
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
