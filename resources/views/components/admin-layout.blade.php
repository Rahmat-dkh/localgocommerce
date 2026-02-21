<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LocalGo Admin') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_lokarasa.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_lokarasa.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false }">
    <div class="h-screen flex md:flex-row overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 md:w-72 bg-neutral-dark text-white transform transition-transform duration-300 ease-in-out md:relative md:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center h-14 md:h-16 border-b border-slate-700 bg-neutral-dark/50">
                    <a href="/"
                        class="text-xl md:text-2xl font-black tracking-tighter text-white hover:text-primary transition-colors">LocalGo<span
                            class="text-primary">.</span></a>
                </div>

                <!-- Nav Links -->
                <nav class="flex-1 px-3 md:px-4 py-6 md:py-8 space-y-1.5 md:space-y-2 overflow-y-auto">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Dashboard</span>
                    </a>

                    <div class="pt-3 pb-1.5 md:pt-4 md:pb-2">
                        <p
                            class="px-4 md:px-6 text-[10px] md:text-xs font-black text-slate-500 uppercase tracking-widest">
                            Manajemen</p>
                    </div>

                    <a href="{{ route('admin.products.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.products*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Produk</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.categories*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Kategori</span>
                    </a>

                    <a href="{{ route('admin.vendors.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.vendors*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 012-2H9a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 012 2v4a2 2 0 01-2 2H9">
                            </path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Kuliner / Tenant</span>
                    </a>

                    <div class="pt-3 pb-1.5 md:pt-4 md:pb-2">
                        <p
                            class="px-4 md:px-6 text-[10px] md:text-xs font-black text-slate-500 uppercase tracking-widest">
                            Transaksi</p>
                    </div>

                    <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.orders*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Manajemen Pesanan</span>
                    </a>

                    <a href="{{ route('admin.payouts.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.payouts*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Penarikan Dana</span>
                    </a>

                    <div class="pt-3 pb-1.5 md:pt-4 md:pb-2">
                        <p
                            class="px-4 md:px-6 text-[10px] md:text-xs font-black text-slate-500 uppercase tracking-widest">
                            Komunikasi</p>
                    </div>

                    <a href="{{ route('admin.contacts.index') }}"
                        class="flex items-center px-4 md:px-6 py-3 md:py-4 rounded-xl transition-all group {{ request()->routeIs('admin.contacts*') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-3 md:mr-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-bold text-sm md:text-base">Pesan Masuk</span>
                        @if (\App\Models\Contact::where('is_read', false)->count() > 0)
                            <span
                                class="ml-auto bg-red-500 text-white text-[9px] md:text-xs font-black px-1.5 py-0.5 md:px-2 md:py-1 rounded-full">
                                {{ \App\Models\Contact::where('is_read', false)->count() }}
                            </span>
                        @endif
                    </a>
                </nav>

                <!-- User Profile -->
                <div class="p-3 md:p-4 border-t border-slate-700 bg-neutral-dark/50">
                    <div class="flex items-center gap-2 md:gap-3">
                        <div
                            class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-primary flex items-center justify-center text-white font-black text-xs md:text-base">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 overflow-hidden">
                            <p class="text-xs md:text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] md:text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center px-4 py-2 bg-slate-800 text-slate-300 rounded-lg text-sm font-bold hover:bg-red-500 hover:text-white transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Overlay -->
        <div class="fixed inset-0 bg-black/50 z-40 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition.opacity></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Header -->
            <header
                class="bg-white/80 backdrop-blur-md border-b border-slate-200 h-14 md:h-16 flex items-center justify-between px-4 md:px-8 z-30 sticky top-0">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="md:hidden p-2 text-slate-500 hover:text-primary mr-2 md:mr-4">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </button>
                    <!-- Real-time Clock -->
                    <div class="hidden md:flex items-center gap-2 text-slate-500 bg-slate-100 px-4 py-2 rounded-xl"
                        id="clock-container">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="clock" class="text-sm font-bold font-mono">Loading...</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="/" target="_blank"
                        class="hidden sm:flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-500 hover:text-primary hover:bg-slate-50 rounded-xl transition-all">
                        <span>View Website</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-slate-50 pt-0 px-3 pb-6 md:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Clock Script -->
    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('clock').textContent = now.toLocaleDateString('id-ID', options);
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>

</html>