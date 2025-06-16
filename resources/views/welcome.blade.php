@extends('layouts.app')

@section('title', 'MegaStop - Premium Shopping Experience')

@section('content')
<!-- Hero Section -->
<section class="hero-section relative bg-gradient-to-br from-gold via-gold-light to-white min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="hero-bg absolute inset-0 opacity-10"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="hero-title text-6xl md:text-8xl font-display font-bold text-white mb-6 leading-tight">
                MegaStop
                <span class="block text-4xl md:text-6xl text-gold-light font-light mt-2">
                    Premium Collection
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                Discover extraordinary products crafted with precision and passion. Experience luxury that transcends expectations.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button onclick="document.getElementById('products').scrollIntoView({behavior: 'smooth'})" 
                        class="premium-btn-primary px-8 py-4 text-lg font-semibold">
                    Explore Collection
                </button>
                <button onclick="window.location.href='/admin'" 
                        class="premium-btn-secondary px-8 py-4 text-lg font-semibold">
                    Admin Dashboard
                </button>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle delay-1"></div>
        <div class="floating-circle delay-2"></div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-4">
                Why Choose MegaStop?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We deliver excellence through innovation, quality, and unmatched customer experience.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="feature-card glass-card text-center p-8">
                <div class="feature-icon w-16 h-16 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Premium Quality</h3>
                <p class="text-gray-600">Every product is carefully curated and inspected to meet our highest standards of excellence.</p>
            </div>
            
            <div class="feature-card glass-card text-center p-8">
                <div class="feature-icon w-16 h-16 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Fast Delivery</h3>
                <p class="text-gray-600">Lightning-fast shipping ensures your orders reach you when you need them most.</p>
            </div>
            
            <div class="feature-card glass-card text-center p-8">
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
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 mb-4">
                Featured Products
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our handpicked selection of premium products, each one chosen for its exceptional quality and design.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-7xl mx-auto">
            @foreach($products as $product)
            <div class="product-card premium-card group">
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

<!-- Newsletter Section -->
<section class="py-20 bg-gradient-to-r from-gold-dark via-gold to-gold-light">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">
                Stay in the Loop
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Be the first to know about new arrivals, exclusive offers, and insider updates.
            </p>
            
            <div class="newsletter-form bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" 
                           placeholder="Enter your email" 
                           class="flex-1 px-6 py-4 rounded-xl bg-white/20 border-2 border-white/30 text-white placeholder-white/70 focus:border-white focus:outline-none focus:ring-2 focus:ring-white/50 backdrop-blur-sm">
                    <button type="submit" 
                            class="premium-btn-white px-8 py-4 font-semibold whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-white/70 text-sm mt-4">
                    We respect your privacy. Unsubscribe anytime.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Cart Notification -->
<div id="cartNotification" class="fixed top-6 right-6 z-50 transform translate-x-full transition-transform duration-300">
    <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span>Added to cart!</span>
    </div>
</div>

@push('scripts')
<script>
// Enhanced cart functionality with notifications
function showCartNotification() {
    const notification = document.getElementById('cartNotification');
    notification.classList.remove('translate-x-full');
    setTimeout(() => {
        notification.classList.add('translate-x-full');
    }, 2000);
}

// Enhanced add to cart with animation
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('add-to-cart')) {
        e.preventDefault();
        const button = e.target;
        const originalText = button.textContent;
        
        // Button loading state
        button.innerHTML = '<svg class="animate-spin w-5 h-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        button.disabled = true;
        
        // Add to cart
        axios.post('/cart/add', { id: button.dataset.id })
            .then(response => {
                fetchCart();
                showCartNotification();
                
                // Success state
                button.innerHTML = '<svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                button.classList.remove('premium-btn-primary');
                button.classList.add('bg-green-500', 'hover:bg-green-600');
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.add('premium-btn-primary');
                    button.classList.remove('bg-green-500', 'hover:bg-green-600');
                    button.disabled = false;
                }, 1500);
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
                button.textContent = originalText;
                button.disabled = false;
            });
    }
});

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
        }
    });
}, observerOptions);

// Observe elements for animation
document.querySelectorAll('.product-card, .feature-card').forEach(el => {
    observer.observe(el);
});
</script>
@endpush
@endsection
