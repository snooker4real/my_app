<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900 antialiased">
<header class="bg-slate-800 text-white shadow-lg">
    <nav class="max-w-screen-lg mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo or Title -->
        <a href="{{ route('posts.index') }}" class="text-lg font-semibold hover:text-slate-300">
            {{ env('APP_NAME') }}
        </a>

        <!-- Authenticated Dropdown or Guest Links -->
        <div class="flex items-center space-x-6">
            @auth
                <div class="relative" x-data="{ open: false }">
                    <!-- Dropdown Trigger -->
                    <button @click="open = !open" type="button" class="flex items-center space-x-2 hover:bg-slate-700 rounded-full px-2 py-1">
                        <img src="https://picsum.photos/40" alt="User Avatar" class="w-10 h-10 rounded-full">
                        <span class="hidden sm:inline font-medium">{{ auth()->user()->username }}</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-white text-slate-900 shadow-lg rounded-lg overflow-hidden">
                        <p class="px-4 py-2 text-sm font-semibold border-b">{{ auth()->user()->username }}</p>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm hover:bg-slate-100">Dashboard</a>
                        <form action="{{ route('logout') }}" method="post" class="border-t">
                            @csrf
                            <button class="w-full text-left px-4 py-2 text-sm hover:bg-slate-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-slate-300">Login</a>
                    <a href="{{ route('register') }}" class="text-sm font-medium hover:bg-slate-700 bg-slate-900 px-4 py-2 rounded-md text-white">Register</a>
                </div>
            @endguest
        </div>
    </nav>
</header>

<main class="py-8 px-4 mx-auto max-w-screen-lg">
    {{ $slot }}
</main>
</body>
</html>
