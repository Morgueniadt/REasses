<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="max-w-md w-full bg-black dark:bg-gray-800 p-8 shadow-lg rounded-lg">
            <h2 class="text-center text-2xl font-bold text-white">Welcome to ReAsses</h2>
            <p class="text-center text-white mb-6">Sign in to continue</p>

            <!-- Display Error Message -->
            @if(session('error'))
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Sign In Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-white">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600">
                        <span class="ml-2 text-sm text-white">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline dark:text-blue-400">
                        Forgot password?
                    </a>
                </div>

                <!-- Sign In Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition dark:bg-blue-500 dark:hover:bg-blue-600">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mt-6 text-center text-sm text-white">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline dark:text-blue-400">Register</a>
            </p>
        </div>
    </div>
</x-guest-layout>
