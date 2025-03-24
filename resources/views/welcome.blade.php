<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-center text-2xl font-bold text-gray-900">Welcome to ReAsses</h2>
            <p class="text-center text-gray-600 mb-6">Sign in to continue</p>

            <!-- Sign In Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Forgot password?
                    </a>
                </div>

                <!-- Sign In Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            </p>
        </div>
    </div>
</x-guest-layout>
