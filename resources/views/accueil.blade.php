<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6 bg-gradient-to-br from-gray-800 via-gray-700 to-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
        @csrf

        <h2 class="text-2xl font-bold text-center text-gray-100">{{ __('Welcome Back') }}</h2>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input 
                id="email" 
                class="block mt-2 w-full px-4 py-2 bg-gray-800 border border-gray-700 text-gray-200 rounded-md focus:ring-4 focus:ring-indigo-500 focus:border-indigo-500 transition-transform transform hover:scale-105 duration-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input 
                id="password" 
                class="block mt-2 w-full px-4 py-2 bg-gray-800 border border-gray-700 text-gray-200 rounded-md focus:ring-4 focus:ring-indigo-500 focus:border-indigo-500 transition-transform transform hover:scale-105 duration-200" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded bg-gray-800 border-gray-700 text-indigo-600 focus:ring-4 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                    name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-400 hover:text-gray-100 transition-colors underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 focus:ring-4 focus:ring-indigo-400 shadow-lg transform hover:scale-105 transition-transform duration-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
