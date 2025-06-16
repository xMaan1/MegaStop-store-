<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MegaStop - Premium Shopping Experience')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .btn-primary {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
        }
        .navbar-glass {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #fffbeb 0%, #ffffff 50%, #fef3c7 100%);
        }
        .text-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #FF6B35 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="navbar-glass fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-gradient font-display">MegaStop</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-primary-600 transition-colors">Home</a>
                    <a href="/products" class="text-gray-700 hover:text-primary-600 transition-colors">Products</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="/admin" class="text-gray-700 hover:text-primary-600 transition-colors">Admin</a>
                        @endif
                        <a href="/profile" class="text-gray-700 hover:text-primary-600 transition-colors">Profile</a>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-primary-600 transition-colors">Login</a>
                    @endauth
                </div>
                <div class="flex items-center space-x-4">
                    <button id="cartBtn" class="relative p-2 text-gray-700 hover:text-primary-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.5 5M7 13v6a1 1 0 001 1h6a1 1 0 001-1v-6m4 0V9a1 1 0 00-1-1H9a1 1 0 00-1 1v4h10z"></path>
                        </svg>
                        <span id="cartCount" class="absolute -top-2 -right-2 bg-accent text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Cart Modal -->
    <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 w-full max-w-lg mx-4 relative animate-slide-up">
            <button id="closeCart" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-6 font-display">Shopping Cart</h2>
            <div id="cartItems" class="space-y-4 mb-6 max-h-60 overflow-y-auto"></div>
            <div class="border-t pt-4">
                <div class="flex justify-between items-center text-xl font-bold mb-4">
                    <span>Total:</span>
                    <span class="text-primary-600">$<span id="cartTotal">0.00</span></span>
                </div>
                <button class="btn-primary w-full">Checkout</button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Cart functionality
        const cartBtn = document.getElementById('cartBtn');
        const cartModal = document.getElementById('cartModal');
        const closeCart = document.getElementById('closeCart');
        const cartItems = document.getElementById('cartItems');
        const cartCount = document.getElementById('cartCount');
        const cartTotal = document.getElementById('cartTotal');

        let products = @json($products ?? []);

        function fetchCart() {
            axios.get('/cart').then(res => {
                const cart = res.data;
                let count = 0, total = 0, html = '';
                
                Object.keys(cart).forEach(productId => {
                    const product = products.find(p => p.id == productId);
                    if (product && cart[productId] > 0) {
                        count += cart[productId];
                        total += cart[productId] * product.price;
                        html += `
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <img src="${product.image}" alt="${product.name}" class="w-12 h-12 object-cover rounded">
                                    <div>
                                        <h4 class="font-medium">${product.name}</h4>
                                        <p class="text-sm text-gray-500">$${product.price}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button class="remove-from-cart w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center" data-id="${productId}">-</button>
                                    <span class="w-8 text-center">${cart[productId]}</span>
                                    <button class="add-to-cart w-8 h-8 rounded-full bg-primary-500 hover:bg-primary-600 text-white flex items-center justify-center" data-id="${productId}">+</button>
                                </div>
                            </div>
                        `;
                    }
                });

                cartItems.innerHTML = html || '<p class="text-gray-500 text-center py-8">Your cart is empty</p>';
                cartCount.textContent = count;
                cartTotal.textContent = total.toFixed(2);
            });
        }

        cartBtn.onclick = () => {
            cartModal.classList.remove('hidden');
            fetchCart();
        };

        closeCart.onclick = () => cartModal.classList.add('hidden');
        cartModal.onclick = (e) => {
            if (e.target === cartModal) cartModal.classList.add('hidden');
        };

        cartItems.onclick = (e) => {
            if (e.target.classList.contains('remove-from-cart')) {
                axios.post('/cart/remove', { id: e.target.dataset.id }).then(fetchCart);
            }
            if (e.target.classList.contains('add-to-cart')) {
                axios.post('/cart/add', { id: e.target.dataset.id }).then(fetchCart);
            }
        };

        // Initialize cart
        fetchCart();
        setInterval(fetchCart, 10000); // Update every 10 seconds

        // Add to cart functionality for product pages
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('add-to-cart-btn')) {
                const productId = e.target.dataset.id;
                axios.post('/cart/add', { id: productId }).then(() => {
                    fetchCart();
                    // Show success message
                    const toast = document.createElement('div');
                    toast.className = 'fixed top-20 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                    toast.textContent = 'Added to cart!';
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
