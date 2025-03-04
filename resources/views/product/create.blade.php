@extends('layout.adminLayout')
@section('title')create products @endsection

@section('content')


<div class="container">
    <div class="product-form-container">
        <h3>Add New Product</h3>
            @if(session()->has('success'))
                <p>{{ session()->get('success')}}</p>
            @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter product description">  </textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (USD)</label>
                <input type="number" step="0.01" class="form-control" name="price" placeholder="Enter product price" value="{{ old('price') }}">
                @error('price') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image" id="imageUpload">
                <img id="imagePreview" class="image-preview">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categorie" id="category" class="form-select">
                    <option value="">-- Select Category --</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Cosmetics">Cosmetics</option>
                    <option value="Clothing">Clothing</option>
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection