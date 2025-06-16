<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'MegaStop') }} - Premium Electronics Store</title>
    
    <!-- Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-display {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Modern Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-display text-gray-900">
                        MegaStop
                    </a>
                </div>
                  <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Products</a>
                    <a href="#features" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Features</a>
                    <a href="#contact" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Contact</a>
                </div>
                
                <!-- Cart & Auth -->
                <div class="flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <div class="relative">
                        <button id="cart-toggle" class="p-2 text-gray-600 hover:text-gold transition-colors duration-200 relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13h10m0 0l1.5 6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6"></path>
                            </svg>
                            <span id="cart-count" class="absolute -top-2 -right-2 bg-gold text-black text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold shadow-lg border-2 border-white min-w-6">0</span>
                        </button>
                    </div>
                    
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="premium-btn-primary px-4 py-2">Register</a>
                    @else
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Logout</button>
                        </form>
                    @endguest
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="p-2 text-gray-600 hover:text-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 py-4 space-y-4">
                <a href="#products" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Products</a>
                <a href="#features" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Features</a>
                <a href="#contact" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Register</a>
                @else
                    <a href="{{ route('admin.dashboard') }}" class="block text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Dashboard</a>
                @endguest
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>
    
    <!-- Modern Footer -->
    <footer class="bg-gray-900 text-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold font-display mb-4">MegaStop</h3>
                    <p class="text-gray-400 mb-6 max-w-md">Your premier destination for cutting-edge electronics and technology. Experience the future of shopping with our curated collection of premium devices.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gold transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gold transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gold transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.098.119.112.223.083.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.748-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z.017 0z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Products</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 123 Tech Street, Digital City</li>
                        <li>📞 (555) 123-4567</li>
                        <li>✉️ info@megastop.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} MegaStop. All rights reserved. Built with ❤️</p>            </div>
        </div>
    </footer>
    
    <!-- Cart Sidebar -->
    <div id="cart-sidebar" class="fixed top-0 right-0 h-full w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col h-full">
            <!-- Cart Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-xl font-bold text-gray-900">Shopping Cart</h3>
                <button id="close-cart" class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Cart Items -->
            <div id="cart-items" class="flex-1 overflow-y-auto p-6">
                <div id="empty-cart" class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13h10m0 0l1.5 6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6"></path>
                    </svg>
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h4>
                    <p class="text-gray-600">Add some products to get started!</p>
                </div>
            </div>
            
            <!-- Cart Footer -->
            <div id="cart-footer" class="hidden border-t border-gray-200 p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-medium text-gray-900">Total:</span>
                    <span id="cart-total" class="text-2xl font-bold text-gold">$0.00</span>
                </div>
                <div class="space-y-3">
                    <button class="w-full premium-btn-primary py-3">
                        Checkout
                    </button>
                    <button id="clear-cart" class="w-full border border-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                        Clear Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cart Overlay -->
    <div id="cart-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300"></div>
    
    <!-- Cart Notification -->
    <div id="cart-notification" class="fixed top-20 right-4 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="bg-gold text-black px-6 py-3 rounded-lg shadow-lg border-2 border-white">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span id="cart-message">Item added to cart!</span>
            </div>
        </div>
    </div>
      <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Cart functionality
        class Cart {
            constructor() {
                this.items = {};
                this.loadCart();
                this.bindEvents();
                this.updateUI();
            }
            
            loadCart() {
                this.fetchCartFromServer();
            }
            
            async fetchCartFromServer() {
                try {
                    const response = await fetch('/cart');
                    const data = await response.json();
                    this.items = data.cart || {};
                    this.updateUI();
                } catch (error) {
                    console.error('Error fetching cart:', error);
                }
            }
            
            bindEvents() {
                // Cart toggle
                document.getElementById('cart-toggle').addEventListener('click', () => {
                    this.toggleCart();
                });
                
                // Close cart
                document.getElementById('close-cart').addEventListener('click', () => {
                    this.closeCart();
                });
                
                // Cart overlay
                document.getElementById('cart-overlay').addEventListener('click', () => {
                    this.closeCart();
                });
                
                // Clear cart
                document.getElementById('clear-cart').addEventListener('click', () => {
                    this.clearCart();
                });
                
                // Add to cart buttons
                document.addEventListener('click', (e) => {
                    if (e.target.classList.contains('add-to-cart')) {
                        e.preventDefault();
                        this.addToCart(e.target);
                    }
                });
            }
            
            toggleCart() {
                const sidebar = document.getElementById('cart-sidebar');
                const overlay = document.getElementById('cart-overlay');
                
                sidebar.classList.toggle('translate-x-full');
                overlay.classList.toggle('opacity-0');
                overlay.classList.toggle('invisible');
            }
            
            closeCart() {
                const sidebar = document.getElementById('cart-sidebar');
                const overlay = document.getElementById('cart-overlay');
                
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('opacity-0');
                overlay.classList.add('invisible');
            }
            
            async addToCart(button) {
                const productId = button.dataset.id;
                const originalText = button.textContent;
                
                // Button loading state
                button.innerHTML = '<svg class="animate-spin w-4 h-4 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
                button.disabled = true;
                
                try {
                    const response = await fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ id: productId, quantity: 1 })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.items = data.cart;
                        this.updateUI();
                        this.showNotification('Item added to cart!');
                        
                        // Success state
                        button.innerHTML = '<svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                        button.classList.remove('premium-btn-primary');
                        button.classList.add('bg-green-500', 'hover:bg-green-600', 'text-white');
                        
                        setTimeout(() => {
                            button.textContent = originalText;
                            button.classList.add('premium-btn-primary');
                            button.classList.remove('bg-green-500', 'hover:bg-green-600', 'text-white');
                            button.disabled = false;
                        }, 1500);
                    }
                } catch (error) {
                    console.error('Error adding to cart:', error);
                    button.textContent = originalText;
                    button.disabled = false;
                    this.showNotification('Error adding to cart', 'error');
                }
            }
            
            async removeFromCart(productId) {
                try {
                    const response = await fetch('/cart/remove', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ id: productId })
                    });
                    
                    const data = await response.json();
                    if (data.success) {
                        this.items = data.cart;
                        this.updateUI();
                        this.showNotification('Item removed from cart');
                    }
                } catch (error) {
                    console.error('Error removing from cart:', error);
                }
            }
            
            async updateQuantity(productId, quantity) {
                try {
                    const response = await fetch('/cart/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ id: productId, quantity: quantity })
                    });
                    
                    const data = await response.json();
                    if (data.success) {
                        this.items = data.cart;
                        this.updateUI();
                    }
                } catch (error) {
                    console.error('Error updating cart:', error);
                }
            }
            
            async clearCart() {
                try {
                    const response = await fetch('/cart/clear', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    
                    const data = await response.json();
                    if (data.success) {
                        this.items = {};
                        this.updateUI();
                        this.showNotification('Cart cleared');
                    }
                } catch (error) {
                    console.error('Error clearing cart:', error);
                }
            }
            
            updateUI() {
                this.updateCartCount();
                this.updateCartItems();
                this.updateCartTotal();
            }
              updateCartCount() {
                try {
                    const count = Object.values(this.items).reduce((sum, item) => {
                        return sum + (parseInt(item.quantity) || 0);
                    }, 0);
                    document.getElementById('cart-count').textContent = count || 0;
                } catch (error) {
                    console.error('Error updating cart count:', error);
                    document.getElementById('cart-count').textContent = 0;
                }
            }
            
            updateCartItems() {
                const container = document.getElementById('cart-items');
                const emptyCart = document.getElementById('empty-cart');
                const cartFooter = document.getElementById('cart-footer');
                
                if (Object.keys(this.items).length === 0) {
                    emptyCart.classList.remove('hidden');
                    cartFooter.classList.add('hidden');
                    return;
                }
                
                emptyCart.classList.add('hidden');
                cartFooter.classList.remove('hidden');
                
                const itemsHtml = Object.values(this.items).map(item => `
                    <div class="flex items-center gap-4 py-4 border-b border-gray-100 last:border-b-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex-shrink-0">
                            ${item.image ? `<img src="/storage/${item.image}" alt="${item.name}" class="w-full h-full object-cover rounded-lg">` : `
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            `}
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">${item.name}</h4>
                            <p class="text-gold font-bold">$${parseFloat(item.price).toFixed(2)}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="cart.updateQuantity(${item.id}, ${item.quantity - 1})" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">-</button>
                            <span class="w-8 text-center">${item.quantity}</span>
                            <button onclick="cart.updateQuantity(${item.id}, ${item.quantity + 1})" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">+</button>
                        </div>
                        <button onclick="cart.removeFromCart(${item.id})" class="text-red-500 hover:text-red-700 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                `).join('');
                
                container.innerHTML = itemsHtml + emptyCart.outerHTML;
            }
            
            updateCartTotal() {
                const total = Object.values(this.items).reduce((sum, item) => sum + (item.price * item.quantity), 0);
                document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
            }
            
            showNotification(message, type = 'success') {
                const notification = document.getElementById('cart-notification');
                const messageEl = document.getElementById('cart-message');
                messageEl.textContent = message;
                
                notification.classList.remove('translate-x-full');
                
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                }, 3000);
            }
        }
          // Initialize cart when DOM is loaded
        let cart;
        document.addEventListener('DOMContentLoaded', function() {
            cart = new Cart();
            
            // Debug function for clearing problematic cart data
            window.clearCartData = function() {
                cart.clearCart();
                console.log('Cart data cleared');
            };
        });
        
        // Smooth scrolling for anchor links
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
    </script>
</body>
</html>
