@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-white flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold font-display text-gray-900">
                Welcome Back
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Sign in to your account
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="space-y-4">
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email') }}"
                           required 
                           autofocus 
                           autocomplete="username"
                           class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent focus:z-10 transition-all duration-200">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required 
                           autocomplete="current-password"
                           class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent focus:z-10 transition-all duration-200">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" 
                           name="remember" 
                           type="checkbox" 
                           class="h-4 w-4 text-gold focus:ring-gold border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-gold hover:text-gold-dark transition-colors duration-200">
                            Forgot your password?
                        </a>
                    </div>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-gold to-gold-dark hover:from-gold-dark hover:to-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold transition-all duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-white group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign In
                </button>
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-gold hover:text-gold-dark transition-colors duration-200">
                        Sign up here
                    </a>
                </p>
            </div>
        </form>        <!-- Demo Admin Info -->
        <div class="mt-8 p-4 bg-gold/10 border border-gold/20 rounded-xl">
            <h3 class="text-sm font-medium text-gray-900 mb-2">Demo Admin Account</h3>
            <p class="text-xs text-gray-600">
                Email: admin@megastop.com<br>
                Password: admin123
            </p>
        </div>
    </div>
</div>
@endsection
