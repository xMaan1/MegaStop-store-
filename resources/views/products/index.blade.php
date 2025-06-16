@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-white pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold font-display text-gray-900 mb-4">
                Our <span class="text-gold">Products</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our premium collection of electronics and accessories
            </p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8" data-aos="fade-up" data-aos-delay="100">
            <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap gap-4 items-center">
                
                <!-- Search -->
                <div class="flex-1 min-w-64">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search products..." 
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gold focus:border-transparent transition-all duration-200">
                </div>
                
                <!-- Category Filter -->
                <div class="min-w-48">
                    <select name="category" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gold focus:border-transparent transition-all duration-200">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Sort -->
                <div class="min-w-48">
                    <select name="sort" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gold focus:border-transparent transition-all duration-200">
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Sort by Price</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Sort by Latest</option>
                    </select>
                </div>
                
                <!-- Sort Direction -->
                <div class="min-w-32">
                    <select name="direction" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gold focus:border-transparent transition-all duration-200">
                        <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>↑ Asc</option>
                        <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>↓ Desc</option>
                    </select>
                </div>
                
                <!-- Filter Button -->
                <button type="submit" class="premium-btn-primary px-6 py-3 whitespace-nowrap">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                    </svg>
                    Filter
                </button>
                
                <!-- Clear Filters -->
                @if(request()->anyFilled(['search', 'category', 'sort']))
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gold transition-colors duration-200 px-4 py-3">
                        Clear Filters
                    </a>
                @endif
            </form>
        </div>

        <!-- Results Info -->
        <div class="flex justify-between items-center mb-8" data-aos="fade-up" data-aos-delay="200">
            <p class="text-gray-600">
                Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
            </p>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">View:</span>
                <button class="p-2 text-gray-600 hover:text-gold transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $index => $product)
                    <div class="product-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($index % 4) * 100 + 300 }}">
                        
                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-gray-100 aspect-square">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Quick Actions -->
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="bg-white/90 backdrop-blur-sm p-2 rounded-full shadow-lg hover:bg-white transition-colors duration-200">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Category Badge -->
                            @if($product->category)
                                <div class="absolute top-4 left-4">
                                    <span class="bg-gold/90 text-black text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">
                                        {{ ucfirst($product->category) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-gold transition-colors duration-200">
                                {{ $product->name }}
                            </h3>
                            
                            @if($product->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-2xl font-bold font-display text-gold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                    @if($product->stock && $product->stock < 10)
                                        <span class="text-xs text-red-500 font-medium">
                                            Only {{ $product->stock }} left!
                                        </span>
                                    @endif
                                </div>
                                
                                <button class="add-to-cart premium-btn-primary px-4 py-2 text-sm" 
                                        data-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12" data-aos="fade-up">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Products Found -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="text-gray-400 mb-4">
                    <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 20a7.962 7.962 0 01-5-1.709M15 3H9a2 2 0 00-2 2v1.586a1 1 0 01-.293.707L3.414 10.586A2 2 0 003 12v6a2 2 0 002 2h14a2 2 0 002-2v-6a2 2 0 00-.293-.707L17.414 7.293A1 1 0 0117 6.586V5a2 2 0 00-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No products found</h3>
                <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                <a href="{{ route('products.index') }}" class="premium-btn-primary px-6 py-3">
                    View All Products
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
