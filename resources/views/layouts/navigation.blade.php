<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto flex justify-between items-center px-4 py-2">

        <!-- Left: Logo -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('home') }}" class="text-blue-500 text-3xl font-bold hover:bg-blue-100 rounded-full p-2 transition">
                T
            </a>
            <span class="font-bold text-xl hidden sm:inline">TwitterClone</span>
        </div>

        <!-- Center: Navigation (optional icons like Twitter) -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="flex items-center space-x-1 px-3 py-2 hover:bg-gray-100 rounded-full transition">
                <span class="text-xl">🏠</span>
                <span class="font-semibold hidden lg:inline">Home</span>
            </a>
            <a href="#" class="flex items-center space-x-1 px-3 py-2 hover:bg-gray-100 rounded-full transition">
                <span class="text-xl">🔍</span>
                <span class="font-semibold hidden lg:inline">Explore</span>
            </a>
            <a href="#" class="flex items-center space-x-1 px-3 py-2 hover:bg-gray-100 rounded-full transition">
                <span class="text-xl">🔔</span>
                <span class="font-semibold hidden lg:inline">Notifications</span>
            </a>
            <a href="#" class="flex items-center space-x-1 px-3 py-2 hover:bg-gray-100 rounded-full transition">
                <span class="text-xl">✉️</span>
                <span class="font-semibold hidden lg:inline">Messages</span>
            </a>
        </div>

        <!-- Right: Profile / Auth -->
        <div class="flex items-center space-x-4">
            @auth
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 px-2 py-1 rounded-full hover:bg-gray-100 transition">
                        <img src="{{ optional(Auth::user()->profile)->avatar ? asset('avatars/'.Auth::user()->profile->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}"
                             alt="Avatar" class="w-8 h-8 rounded-full border border-gray-300">
                        <span class="hidden sm:inline font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg py-1">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Register</a>
            @endauth
        </div>

    </div>
</nav>
