@extends('layouts.guest')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-gold/20 via-transparent to-purple-500/20"></div>
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gold/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-128 h-128 bg-blue-500/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
            <h1 class="hero-title text-6xl md:text-8xl font-display font-bold text-white mb-6 leading-tight">
                <span class="bg-gradient-to-r from-gold via-yellow-400 to-gold bg-clip-text text-transparent">MegaStop</span>
                <span class="block text-4xl md:text-6xl text-white font-light mt-2">
                    Tech Paradise
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Discover the future of technology with our curated collection of premium electronics. Experience innovation that exceeds expectations.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button onclick="document.getElementById('products').scrollIntoView({behavior: 'smooth'})" 
                        class="premium-btn-primary px-8 py-4 text-lg font-semibold">
                    Explore Collection
                </button>
                @auth
                <button onclick="window.location.href='/admin'" 
                        class="premium-btn-secondary px-8 py-4 text-lg font-semibold bg-white/10 backdrop-blur-sm text-white border-white/20 hover:bg-white/20">
                    Admin Dashboard
                </button>
                @endauth
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle delay-1"></div>
        <div class="floating-circle delay-2"></div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-4">
                Why Choose MegaStop?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We deliver excellence through innovation, quality, and unmatched customer experience.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="feature-card glass-card text-center p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon w-16 h-16 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Premium Quality</h3>
                <p class="text-gray-600">Every product is carefully curated and inspected to meet our highest standards of excellence.</p>
            </div>
            
            <div class="feature-card glass-card text-center p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon w-16 h-16 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Fast Delivery</h3>
                <p class="text-gray-600">Lightning-fast shipping ensures your orders reach you when you need them most.</p>
            </div>
            
            <div class="feature-card glass-card text-center p-8" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon w-16 h-16 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer First</h3>
                <p class="text-gray-600">Our dedicated support team is available 24/7 to ensure your complete satisfaction.</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-4">
                Featured Products
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our handpicked selection of premium products, each one chosen for its exceptional quality and design.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-7xl mx-auto">
            @foreach($products as $index => $product)
            <div class="product-card premium-card group" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                <div class="product-image-container relative overflow-hidden rounded-xl mb-6">
                    <img src="{{ $product->image }}" 
                         alt="{{ $product->name }}" 
                         class="product-image w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="product-overlay absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                        <button class="add-to-cart premium-btn-primary py-2 px-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300" 
                                data-id="{{ $product->id }}">
                            Add to Cart
                        </button>
                    </div>
                    <div class="product-badge absolute top-4 left-4 bg-gold text-black px-3 py-1 rounded-full text-sm font-bold">
                        Premium
                    </div>
                </div>
                
                <div class="product-info p-6">
                    <h3 class="product-title text-xl font-bold text-gray-900 mb-2 group-hover:text-gold transition-colors duration-300">
                        {{ $product->name }}
                    </h3>
                    <p class="product-description text-gray-600 mb-4 line-clamp-2">
                        {{ $product->description }}
                    </p>
                    <div class="product-price text-2xl font-bold text-gold mb-4">
                        ${{ number_format($product->price, 2) }}
                    </div>
                    <div class="product-rating flex items-center mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-gold fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="text-gray-500 text-sm ml-2">(4.9)</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- View All Products Button -->
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('products.index') }}" class="premium-btn-primary px-8 py-3 text-lg">
                View All Products
                <svg class="w-5 h-5 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        
        @if($products->isEmpty())
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No Products Available</h3>
            <p class="text-gray-600 mb-6">Check back soon for our latest collection!</p>
            <a href="/admin/products/create" class="premium-btn-primary px-6 py-3">Add First Product</a>
        </div>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-r from-gray-900 via-gray-800 to-black" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">
                Stay Connected
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Be the first to know about new arrivals, exclusive offers, and insider updates from MegaStop.
            </p>
            
            <div class="newsletter-form bg-white/10 backdrop-blur-sm rounded-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" 
                           placeholder="Enter your email" 
                           class="flex-1 px-6 py-4 rounded-xl bg-white/20 border-2 border-white/30 text-white placeholder-white/70 focus:border-gold focus:outline-none focus:ring-2 focus:ring-gold/50 backdrop-blur-sm transition-colors duration-300">
                    <button type="submit" 
                            class="bg-gold hover:bg-gold-dark text-black font-semibold px-8 py-4 rounded-xl transition-colors duration-300 whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-gray-400 text-sm mt-4">
                    We respect your privacy. Unsubscribe anytime.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
