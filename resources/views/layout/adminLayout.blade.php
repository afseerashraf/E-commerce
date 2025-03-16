<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('sidebar/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>@yield('title')</title>

    <style>
        /* General Layout */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
        }

        .navbar-brand h4 {
            color: #0d6efd;
            font-weight: 600;
            margin-left: 1rem;
        }

        .navbar-light .navbar-toggler {
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .navbar-light .navbar-toggler-icon {
            background-color: #0d6efd;
        }

        .btn-outline-success {
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-outline-success:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            background-color: #ffffff;
            padding-top: 20px;
            color: #333;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: #333;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .search-bar {
            width: 300px;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            color: #999;
            padding: 10px 0;
            background-color: #ffffff;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        /* Buttons */
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #0d6efd;
            color: #fff;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h4>Admin Panel</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
       
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> Profile</a>
        <a href="{{ route('products.create') }}"><i class="fas fa-plus-circle"></i> Create Product</a>
        <a href="{{ route('products.index') }}"><i class="fas fa-box"></i> Products</a>
        <a href="{{ route('order.orders') }}"><i class="fas fa-shopping-cart"></i> Orders</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Clinic Management. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

</body>

</html>