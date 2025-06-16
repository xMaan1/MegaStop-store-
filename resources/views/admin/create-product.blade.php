@extends('layouts.app')

@section('title', 'Add New Product - Admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('admin.products') }}" class="text-primary-600 hover:text-primary-700 mb-4 inline-flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Products
            </a>
            <h1 class="text-3xl font-bold text-gray-900 font-display">Add New Product</h1>
            <p class="text-gray-600">Create a new product for your store</p>
        </div>

        <!-- Form -->
        <div class="card p-8">
            <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Product Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="input-field @error('name') border-red-500 @enderror" 
                               placeholder="Enter product name" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" 
                               class="input-field @error('price') border-red-500 @enderror" 
                               placeholder="0.00" step="0.01" min="0" required>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" 
                               class="input-field @error('stock') border-red-500 @enderror" 
                               placeholder="0" min="0" required>
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image URL -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                        <input type="url" name="image" id="image" value="{{ old('image') }}" 
                               class="input-field @error('image') border-red-500 @enderror" 
                               placeholder="https://example.com/image.jpg">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Enter a valid image URL from Unsplash or other image sources</p>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="input-field @error('description') border-red-500 @enderror" 
                                  placeholder="Enter product description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.products') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Create Product</button>
                </div>
            </form>
        </div>

        <!-- Sample Images -->
        <div class="mt-8 card p-6">
            <h3 class="text-lg font-semibold mb-4">Sample Image URLs</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="font-medium text-gray-700 mb-2">Watches</p>
                    <p class="text-gray-600 break-all">https://images.unsplash.com/photo-1523275335684-37898b6baf30</p>
                </div>
                <div>
                    <p class="font-medium text-gray-700 mb-2">Bags</p>
                    <p class="text-gray-600 break-all">https://images.unsplash.com/photo-1553062407-98eeb64c6a62</p>
                </div>
                <div>
                    <p class="font-medium text-gray-700 mb-2">Shoes</p>
                    <p class="text-gray-600 break-all">https://images.unsplash.com/photo-1549298916-b41d501d3772</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
