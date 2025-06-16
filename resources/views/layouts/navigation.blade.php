<!-- This navigation is included in the app layout for authenticated pages -->
<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold font-display text-gray-900">
                        MegaStop
                        <span class="text-sm text-gold ml-2">Admin</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8 ml-10">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'border-gold text-gray-900' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.products') }}" 
                       class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200 {{ request()->routeIs('admin.products*') ? 'border-gold text-gray-900' : '' }}">
                        Products
                    </a>
                    <a href="/" 
                       class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                        View Store
                    </a>
                </div>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                @auth
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold transition-all duration-200">
                            <span class="sr-only">Open user menu</span>
                            <div class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-50">
                                <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center">
                                    <span class="text-black font-semibold text-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50 border border-gray-100"
                             style="display: none;">
                            
                            <a href="{{ route('profile.edit') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile
                                </div>
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Log Out
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" 
                           class="text-gray-600 hover:text-gray-900 transition-colors duration-200 font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="premium-btn-primary px-4 py-2">
                            Register
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button x-data="{ open: false }" 
                        @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gold transition-all duration-200">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Include Alpine.js for dropdown functionality -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
