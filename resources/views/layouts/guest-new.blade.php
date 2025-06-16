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
                    <a href="#products" class="text-gray-600 hover:text-gold transition-colors duration-200 font-medium">Products</a>
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
                <p>&copy; {{ date('Y') }} MegaStop. All rights reserved. Built with ❤️</p>
            </div>
        </div>
    </footer>
    
    <!-- Cart Notification -->
    <div id="cart-notification" class="fixed top-20 right-4 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <span id="cart-message">Item added to cart!</span>
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
        let cart = JSON.parse(localStorage.getItem('cart')) || {};
        
        function updateCartCount() {
            const count = Object.values(cart).reduce((sum, qty) => sum + qty, 0);
            document.getElementById('cart-count').textContent = count;
        }
        
        function showCartNotification(message) {
            const notification = document.getElementById('cart-notification');
            const messageEl = document.getElementById('cart-message');
            messageEl.textContent = message;
            notification.classList.remove('translate-x-full');
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
            }, 3000);
        }
        
        // Initialize cart count
        updateCartCount();
        
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
