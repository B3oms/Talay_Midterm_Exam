<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TwitterClone</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- Top Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
        <div class="max-w-3xl mx-auto flex justify-between items-center px-4 py-3">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-blue-500 text-3xl font-bold hover:bg-blue-100 rounded-full p-2 transition">
                HOME
            </a>

           <!-- Profile / Auth -->
<div class="flex items-center space-x-4">
    @auth
        <div class="flex items-center space-x-2">
            <a href="{{ route('profile.show', Auth::user()->id) }}" class="flex items-center space-x-2 hover:underline">
                <img src="{{ optional(Auth::user()->profile)->avatar ? asset('avatars/'.Auth::user()->profile->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}"
                     alt="Avatar" class="w-8 h-8 rounded-full border border-gray-300">
                <span class="font-semibold hidden sm:inline">{{ Auth::user()->name }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-500 px-3 py-1 rounded-full hover:bg-red-100 transition">Logout</button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Register</a>
    @endauth
</div>

        </div>
    </nav>

    <!-- Main Feed -->
    <main class="max-w-3xl mx-auto mt-6 space-y-4 px-4">
        @yield('content')
    </main>

</body>
</html>
