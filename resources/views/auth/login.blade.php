<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- social login -->
        <div class="mt-6 text-center">
            <a href="{{ route('auth.redirection', ['provider' => 'google']) }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-md border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                <img src="/images/google-icon.png" alt="Google Icon" class="h-5 w-5 mr-2">
                {{ __('Log in with Google') }}
            </a>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('auth.redirection', ['provider' => 'facebook']) }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-md border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                <img src="/images/fb.png" alt="Fb Icon" class="h-5 w-5 mr-2">
                {{ __('Log in with Facebook') }}
            </a>
        </div>
    </form>
</x-guest-layout>
