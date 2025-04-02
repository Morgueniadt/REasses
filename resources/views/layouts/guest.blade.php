<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <!-- Full screen background and layout -->
        <div class="flex flex-col items-center justify-center min-h-screen bg-blue-900 dark:bg-gray-900">

            <!-- Sign-in Box Container -->
            <div class="w-full sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-3xl mt-6 px-6 py-4 bg-black dark:bg-gray-800 shadow-lg overflow-hidden rounded-lg">

                <!-- Slot Content for Sign-In Form -->
                {{ $slot }}
                
            </div>

            <!-- Additional Useful Content (Optional) -->
            <div class="mt-8 text-center text-white dark:text-gray-300">
                <p>Welcome to ReAsses, your personal learning platform!</p>
                <p class="text-sm">Sign in to access your notes and assignments.</p>
            </div>
            
        </div>

    </body>
</html>
