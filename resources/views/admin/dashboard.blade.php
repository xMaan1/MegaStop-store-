@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 font-display">Admin Dashboard</h1>
                <p class="text-gray-600 mt-2">Manage your store with real-time insights</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="floating-element p-3 rounded-xl bg-white shadow-lg text-gray-600 hover:text-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM15 17H9a2 2 0 01-2-2V9a2 2 0 012-2h6m0 10V9m0 8l5-5H15z"></path>
                        </svg>
                    </button>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Welcome back,</p>
                    <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="premium-card p-6 stat-card" data-stat="products">
                <div class="flex items-center justify-between">                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Products</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalProducts">{{ $totalProducts }}</p>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="revenue">
                <div class="flex items-center justify-between">                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Revenue</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalRevenue">${{ number_format($totalRevenue, 2) }}</p>
                        <p class="text-xs text-gray-500 mt-1">Orders feature coming soon</p>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="orders">
                <div class="flex items-center justify-between">                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Orders</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2" id="totalOrders">0</p>
                        <p class="text-xs text-gray-500 mt-1">Orders feature coming soon</p>
                    </div>
                    <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 stat-card" data-stat="lowstock">
                <div class="flex items-center justify-between">                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Low Stock Alert</p>
                        <p class="text-3xl font-bold text-red-600 mt-2" id="lowStockProducts">{{ $lowStockProducts }}</p>
                        <p class="text-xs text-gray-500 mt-1">Products with stock < 5</p>
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
                        <button onclick="refreshActivity()" class="text-sm text-gold hover:text-gold-dark font-medium">Refresh</button>
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
            
            @if($products->count() > 0)
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
                        @foreach($products->take(5) as $product)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg object-cover mr-4">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $product->name }}</h4>
                                        <p class="text-sm text-gray-600 line-clamp-1">{{ Str::limit($product->description, 50) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 font-bold text-gold">${{ number_format($product->price, 2) }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-sm {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->stock ?? 0 }}
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
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No products yet</h3>
                <p class="text-gray-600 mb-4">Get started by adding your first product</p>
                <a href="{{ route('admin.products.create') }}" class="premium-btn-primary px-6 py-3">Add Product</a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
// CSRF token for AJAX requests
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// Real-time dashboard functionality
async function fetchStats() {
    try {
        const response = await fetch('/admin/api/stats', {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            }
        });
        const stats = await response.json();
        
        // Update stats with animation
        updateStatWithAnimation('totalProducts', stats.totalProducts);
        updateStatWithAnimation('totalRevenue', '$' + new Intl.NumberFormat().format(stats.totalRevenue));
        updateStatWithAnimation('totalOrders', stats.totalOrders);
        updateStatWithAnimation('lowStockProducts', stats.lowStockProducts);
        
    } catch (error) {
        console.error('Error fetching stats:', error);
    }
}

async function fetchActivity() {
    try {
        const response = await fetch('/admin/api/activity', {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            }
        });
        const activities = await response.json();
        
        const activityFeed = document.getElementById('activityFeed');
        activityFeed.innerHTML = activities.map(activity => `
            <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-gold to-gold-dark rounded-full flex items-center justify-center text-white text-sm">
                    ${activity.icon}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">${activity.message}</p>
                    <p class="text-xs text-gray-500">${activity.time}</p>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('Error fetching activity:', error);
    }
}

function updateStatWithAnimation(elementId, newValue) {
    const element = document.getElementById(elementId);
    if (element) {
        element.style.transform = 'scale(1.05)';
        element.style.transition = 'transform 0.3s ease';
        
        setTimeout(() => {
            element.textContent = newValue;
            element.style.transform = 'scale(1)';
        }, 150);
    }
}

function refreshDashboard() {
    // Add loading state
    const refreshBtn = event.target;
    const originalText = refreshBtn.textContent;
    refreshBtn.textContent = 'Refreshing...';
    refreshBtn.disabled = true;
    
    // Fetch new data
    Promise.all([fetchStats(), fetchActivity()]).then(() => {
        refreshBtn.textContent = originalText;
        refreshBtn.disabled = false;
        
        // Show success notification
        showNotification('Dashboard refreshed successfully!', 'success');
    });
}

function refreshActivity() {
    fetchActivity();
    showNotification('Activity feed refreshed!', 'success');
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Initialize dashboard
document.addEventListener('DOMContentLoaded', function() {
    fetchStats();
    fetchActivity();
    
    // Auto-refresh every 30 seconds
    setInterval(() => {
        fetchStats();
        fetchActivity();
    }, 30000);
});
</script>
@endsection
