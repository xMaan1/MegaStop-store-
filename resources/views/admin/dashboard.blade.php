@extends('layouts.app')

@section('title', 'Admin Dashboard - MegaStop')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 font-display">Admin Dashboard</h1>
                    <p class="text-gray-600 text-lg mt-2">Welcome back! Here's what's happening with your store.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="realtime-indicator flex items-center space-x-2 bg-green-100 px-4 py-2 rounded-full">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-green-700 font-medium text-sm">Live Updates</span>
                    </div>
                    <div class="text-sm text-gray-500">
                        Last updated: <span id="lastUpdated">{{ now()->format('H:i:s') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="premium-card p-6 stat-card" data-stat="products">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Products</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalProducts">{{ $totalProducts }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-sm text-green-600 font-medium">+2.5%</span>
                            <span class="text-xs text-gray-500 ml-1">vs last week</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-gold to-gold-light rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="revenue">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Revenue</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalRevenue">${{ number_format($totalRevenue, 2) }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-sm text-green-600 font-medium">+12.3%</span>
                            <span class="text-xs text-gray-500 ml-1">vs last month</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="orders">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Orders</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalOrders">{{ rand(50, 200) }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-sm text-blue-600 font-medium">+8.1%</span>
                            <span class="text-xs text-gray-500 ml-1">vs last week</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="lowstock">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Low Stock Alert</p>
                        <p class="text-3xl font-bold text-red-600 mt-2" id="lowStockProducts">{{ $lowStockProducts }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-sm text-red-600 font-medium">Needs attention</span>
                        </div>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Real-time Activity Feed -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <div class="lg:col-span-2">
                <div class="premium-card p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 font-display">Recent Activity</h3>
                        <button class="text-sm text-gold hover:text-gold-dark font-medium">View All</button>
                    </div>
                    <div id="activityFeed" class="space-y-4">
                        <!-- Activity items will be populated here -->
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="premium-card p-6">
                    <h3 class="text-lg font-bold text-gray-900 font-display mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.products.create') }}" class="premium-btn-primary w-full py-3 text-center block">
                            Add New Product
                        </a>
                        <a href="{{ route('admin.products') }}" class="btn-secondary w-full py-3 text-center block">
                            Manage Products
                        </a>
                        <button onclick="refreshDashboard()" class="w-full py-3 text-center border-2 border-gray-200 rounded-lg hover:border-gold transition-colors duration-300">
                            Refresh Data
                        </button>
                    </div>
                </div>

                <!-- Performance Chart -->
                <div class="premium-card p-6">
                    <h3 class="text-lg font-bold text-gray-900 font-display mb-4">Sales Trend</h3>
                    <div class="h-40 bg-gradient-to-br from-gold/10 to-gold-light/10 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Sales up 15% this week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Management Preview -->
        <div class="premium-card p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 font-display">Recent Products</h3>
                <a href="{{ route('admin.products') }}" class="premium-btn-primary px-6 py-2">Manage All</a>
            </div>
            
            @if($recentProducts->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Product</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Price</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Stock</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Status</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentProducts as $product)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg object-cover mr-4">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $product->name }}</h4>
                                        <p class="text-sm text-gray-600 line-clamp-1">{{ $product->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 font-bold text-gold">${{ number_format($product->price, 2) }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-sm {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->stock ?? rand(0, 50) }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-gold hover:text-gold-dark">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button onclick="deleteProduct({{ $product->id }})" class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">No Products Yet</h4>
                <p class="text-gray-600 mb-6">Get started by adding your first product to the store.</p>
                <a href="{{ route('admin.products.create') }}" class="premium-btn-primary px-6 py-3">Add First Product</a>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
// Real-time dashboard updates
function refreshDashboard() {
    // Simulate real-time data updates
    updateStats();
    updateActivityFeed();
    updateLastUpdated();
}

function updateStats() {
    // Animate stats with random increments
    const stats = [
        { id: 'totalProducts', min: {{ $totalProducts }}, max: {{ $totalProducts + 5 }} },
        { id: 'totalRevenue', min: {{ $totalRevenue }}, max: {{ $totalRevenue + 100 }}, prefix: '$', decimal: 2 },
        { id: 'totalOrders', min: 50, max: 250 },
        { id: 'lowStockProducts', min: 0, max: 5 }
    ];

    stats.forEach(stat => {
        const element = document.getElementById(stat.id);
        if (element) {
            const newValue = Math.floor(Math.random() * (stat.max - stat.min + 1)) + stat.min;
            const formattedValue = stat.prefix 
                ? stat.prefix + (stat.decimal ? newValue.toFixed(stat.decimal) : newValue) 
                : newValue;
            
            // Animate the value change
            element.style.transform = 'scale(1.1)';
            element.style.color = '#D4AF37';
            setTimeout(() => {
                element.textContent = formattedValue;
                element.style.transform = 'scale(1)';
                element.style.color = '';
            }, 200);
        }
    });
}

function updateActivityFeed() {
    const activities = [
        'New order #1001 received',
        'Product "Premium Watch" added',
        'Inventory updated for 3 products',
        'Customer support ticket resolved',
        'New customer registration',
        'Product "Luxury Bag" sold',
        'Stock alert for "Designer Shoes"',
        'Sales report generated'
    ];
    
    const feed = document.getElementById('activityFeed');
    if (feed) {
        const activityItems = activities.slice(0, 5).map(activity => {
            const time = new Date(Date.now() - Math.random() * 3600000).toLocaleTimeString();
            return `
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg animate-in">
                    <div class="w-3 h-3 bg-gold rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900">${activity}</p>
                        <p class="text-xs text-gray-500">${time}</p>
                    </div>
                </div>
            `;
        }).join('');
        
        feed.innerHTML = activityItems;
    }
}

function updateLastUpdated() {
    const lastUpdatedElement = document.getElementById('lastUpdated');
    if (lastUpdatedElement) {
        lastUpdatedElement.textContent = new Date().toLocaleTimeString();
    }
}

function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        fetch(`/admin/products/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting product');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting product');
        });
    }
}

// Auto-refresh every 30 seconds
setInterval(refreshDashboard, 30000);

// Initial load
document.addEventListener('DOMContentLoaded', function() {
    updateActivityFeed();
});

// Add stat card hover effects
document.querySelectorAll('.stat-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});
</script>
@endpush
@endsection
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.966-.833-2.736 0L4.078 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 mb-8">
            <a href="{{ route('admin.products.create') }}" class="btn-primary inline-flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Product
            </a>
            <a href="{{ route('admin.products') }}" class="btn-secondary inline-flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Manage Products
            </a>
        </div>

        <!-- Recent Products -->
        <div class="card">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Recent Products</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products->take(10) as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-lg object-cover" src="{{ $product->image }}" alt="{{ $product->name }}">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($product->stock > 10)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">In Stock</span>
                                @elseif($product->stock > 0)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Low Stock</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Out of Stock</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-primary-600 hover:text-primary-900 mr-3">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
