<div x-data="{ open: false }">
    <nav
        class="fixed top-0 w-full z-50 bg-primary border-b border-white/5 shadow-xl shadow-primary/20 backdrop-blur-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16 md:h-20 gap-4 md:gap-8">
                <!-- Group Left: Logo & Menu -->
                <div class="flex items-center gap-10">
                    <!-- Left: Logo -->
                    <div class="flex-none flex items-center">
                        <a href="/" class="flex items-center group relative gap-3">
                            <div
                                class="absolute -inset-2 bg-blue-500/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                            </div>
                            <img src="{{ asset('images/logo_localgo.png') }}" alt="LocalGo"
                                class="relative h-8 md:h-11 w-auto object-contain transition-all duration-300 group-hover:scale-110 group-hover:drop-shadow-[0_0_15px_rgba(56,189,248,0.5)] rounded-xl">
                            <span
                                class="relative text-white font-black text-xl md:text-2xl tracking-tighter group-hover:text-cyan-400 transition-colors duration-300">
                                Local<span class="text-cyan-400 group-hover:text-white">Go</span>
                            </span>
                        </a>
                    </div>

                    <!-- Left: Menu Items -->
                    <div class="hidden lg:flex space-x-6">
                        <a href="{{ route('home') }}"
                            class="text-sm font-bold text-white hover:text-cyan-400 transition-all duration-300 relative group px-4 py-2 rounded-full hover:bg-white/10 tracking-wide">
                            Home
                            <span
                                class="absolute bottom-1.5 left-4 right-4 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                        </a>
                        <a href="{{ route('products.index') }}"
                            class="text-sm font-bold text-white hover:text-cyan-400 transition-all duration-300 relative group px-4 py-2 rounded-full hover:bg-white/10 tracking-wide">
                            Produk
                            <span
                                class="absolute bottom-1.5 left-4 right-4 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center {{ request()->routeIs('products.*') ? 'scale-x-100' : '' }}"></span>
                        </a>
                        <!-- Kategori Dropdown -->
                        <div x-data="{ openCategory: false }" class="relative" @click.away="openCategory = false">
                            <button @click="openCategory = !openCategory"
                                class="text-sm font-bold text-white hover:text-cyan-400 transition-all duration-300 relative group px-4 py-2 rounded-full hover:bg-white/10 tracking-wide flex items-center gap-1">
                                Kategori
                                <svg class="w-3 h-3 transition-transform duration-200"
                                    :class="{ 'rotate-180': openCategory }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <span
                                    class="absolute bottom-1.5 left-4 right-4 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center {{ request()->routeIs('categories.*') ? 'scale-x-100' : '' }}"></span>
                            </button>

                            <!-- Dropdown Menu - Clean & Simple -->
                            <div x-show="openCategory" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                class="absolute left-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50"
                                style="display: none;">

                                <!-- Category List -->
                                <div class="max-h-64 overflow-y-auto py-2">
                                    @php
                                        $categories = cache()->remember('navbar_categories', 3600, function () {
                                            return \App\Models\Category::withCount('products')->orderBy('name')->get();
                                        });
                                    @endphp

                                    @forelse($categories as $category)
                                        <a href="{{ route('categories.show', $category->slug) }}"
                                            class="flex items-center justify-between px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors">
                                            {{ $category->name }}
                                            <span
                                                class="text-[10px] font-bold text-gray-400">{{ $category->products_count }}</span>
                                        </a>
                                    @empty
                                        <div class="px-4 py-3 text-center">
                                            <p class="text-sm text-gray-400">Belum ada kategori</p>
                                        </div>
                                    @endforelse
                                </div>

                                <!-- Footer -->
                                <div class="border-t border-gray-100 p-2">
                                    <a href="{{ route('categories.index') }}"
                                        class="flex items-center justify-center gap-1 w-full py-2 text-xs font-bold text-primary hover:bg-primary hover:text-white rounded-lg transition-all">
                                        Lihat Semua
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}"
                            class="text-sm font-bold text-white hover:text-cyan-400 transition-all duration-300 relative group px-4 py-2 rounded-full hover:bg-white/10 tracking-wide">
                            Tentang
                            <span
                                class="absolute bottom-1.5 left-4 right-4 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center {{ request()->routeIs('about') ? 'scale-x-100' : '' }}"></span>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="text-xs font-bold text-white hover:text-cyan-400 transition-all duration-300 relative group px-4 py-2 rounded-full hover:bg-white/10 tracking-wide">
                            Kontak
                            <span
                                class="absolute bottom-1.5 left-4 right-4 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center {{ request()->routeIs('contact') ? 'scale-x-100' : '' }}"></span>
                        </a>
                    </div>
                </div>

                <!-- Group Right: Search & Icons -->
                <div class="flex items-center gap-1 sm:gap-3 lg:gap-5 ml-auto">
                    <!-- Search Trigger (Hidden on Mobile) -->
                    <form action="{{ route('products.index') }}" method="GET" class="relative group hidden xl:block">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari..."
                                class="w-36 focus:w-56 bg-white/10 border border-transparent focus:border-cyan-400/50 rounded-full pl-4 pr-10 py-1.5 text-xs text-white placeholder-slate-300 focus:ring-0 transition-all duration-300 backdrop-blur-sm shadow-inner focus:shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                            <button type="submit"
                                class="absolute right-0 top-0 mt-1.5 mr-3 text-slate-300 hover:text-cyan-400 transition-colors hover:scale-110">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Wishlist (Visible on Mobile) -->
                    <div class="block">
                        <livewire:wishlist-icon />
                    </div>

                    <!-- Cart -->
                    <div class="block">
                        <livewire:cart-counter />
                    </div>

                    <!-- Auth Dropdown (Hidden on Mobile) -->
                    @auth
                        <div class="hidden md:flex items-center ml-2 sm:ml-4">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center p-0.5 border-2 border-transparent hover:border-cyan-400/50 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-[0_0_15px_rgba(34,211,238,0.4)]">
                                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0ea5e9&color=fff' }}"
                                            class="w-8 h-8 rounded-full object-cover shadow-sm bg-white/10" />
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-3 bg-slate-50 border-b border-gray-100 rounded-t-xl">
                                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Halo,
                                            {{ Str::words(Auth::user()->name, 1, '') }}!
                                        </p>
                                        <p class="text-[10px] font-medium text-slate-500 truncate">{{ Auth::user()->email }}
                                        </p>
                                    </div>
                                    @if(Auth::user()->isAdmin())
                                        <x-dropdown-link :href="route('admin.dashboard')"
                                            class="font-bold {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition-colors text-xs">
                                            Admin Panel
                                        </x-dropdown-link>
                                    @endif

                                    @if(Auth::user()->isSeller())
                                        <x-dropdown-link :href="route('vendor.dashboard')"
                                            class="font-bold {{ request()->routeIs('vendor.dashboard') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition-colors text-xs">
                                            Dashboard Toko
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('shop.show', Auth::user()->vendor->slug)" target="_blank"
                                            class="font-bold {{ request()->routeIs('shop.show') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition-colors text-xs">
                                            Lihat Toko
                                        </x-dropdown-link>
                                    @else
                                        <x-dropdown-link :href="route('dashboard')"
                                            class="font-bold {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-slate-600' }} hover:text-primary transition-colors text-xs">
                                            Dashboard
                                        </x-dropdown-link>
                                    @endif

                                    <x-dropdown-link :href="route('profile.edit')"
                                        class="font-bold text-slate-600 hover:text-primary transition-colors text-xs">
                                        Edit Profil
                                    </x-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST"
                                        action="{{ Auth::user()->isAdmin() ? route('admin.logout') : route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="Auth::user()->isAdmin() ? route('admin.logout') : route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="text-red-500 font-bold hover:bg-red-50 transition-colors text-xs">
                                            Keluar
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="hidden md:flex items-center ml-2 sm:ml-4">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center p-2 text-white hover:text-cyan-400 transition-all duration-300 border-2 border-transparent hover:border-cyan-400/30 rounded-full hover:scale-110 hover:bg-white/5">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-3 bg-slate-50 border-b border-gray-100 rounded-t-xl">
                                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Selamat
                                            Datang</p>
                                        <p class="text-[10px] text-slate-500 mt-1">Silakan masuk atau daftar.</p>
                                    </div>
                                    <x-dropdown-link :href="route('login')"
                                        class="font-bold text-primary hover:text-primary-dark transition-colors text-xs">
                                        Masuk Akun
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('register')"
                                        class="font-bold text-slate-600 hover:text-primary transition-colors text-xs">
                                        Daftar Baru
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endauth

                    <!-- Mobile menu button -->
                    <button @click="open = ! open"
                        class="md:hidden p-1 text-white hover:text-cyan-400 transition-all duration-300 flex items-center justify-center ml-1 hover:scale-110 hover:bg-white/5 rounded-full z-50 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile menu Drawer -->
    <div x-show="open" class="fixed inset-0 z-[60] md:hidden" style="display: none;">
        <!-- Backdrop -->
        <div x-show="open" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-400"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false"
            class="absolute inset-0 bg-neutral-dark/80 backdrop-blur-sm"></div>

        <!-- Drawer Content -->
        <div x-show="open" x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-400 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed right-0 top-0 bottom-0 w-[60%] max-w-[220px] bg-[#111827] flex flex-col shadow-2xl z-[100] border-l border-white/5 h-full overflow-y-auto">

            <!-- Header inside Drawer -->
            <div
                class="relative px-5 pt-8 pb-4 flex flex-col items-start justify-center border-b border-white/5 bg-[#111827]">
                <button @click="open = false"
                    class="absolute top-4 right-4 w-7 h-7 rounded-lg bg-white/5 flex items-center justify-center text-white hover:bg-primary transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <h3 class="text-white font-black text-base uppercase tracking-wider">Navigasi</h3>
                <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-slate-500 mt-1">Menu Utama</p>
            </div>

            <!-- Links -->
            <div class="flex-grow bg-[#111827] px-3">
                <nav class="flex flex-col space-y-1 mt-2">
                    <a href="{{ route('home') }}"
                        class="group flex items-center px-6 py-3 text-sm font-bold text-slate-300 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                        <span
                            class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Home</span>
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="group flex items-center px-6 py-3 text-sm font-bold text-slate-300 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                        <span
                            class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Produk</span>
                    </a>
                    <!-- Kategori Dropdown Mobile -->
                    <div x-data="{ openMobileCategory: false }" class="w-full">
                        <button @click="openMobileCategory = !openMobileCategory"
                            class="group flex items-center justify-between w-full px-6 py-3 text-sm font-bold text-slate-300 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5">
                            <span class="uppercase tracking-widest">Kategori</span>
                            <svg class="w-4 h-4 transition-transform duration-300"
                                :class="{ 'rotate-180': openMobileCategory }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Mobile Category List -->
                        <div x-show="openMobileCategory" x-collapse
                            class="mt-1 ml-6 space-y-0.5 border-l border-white/10 pl-4">
                            @php
                                $mobileCategories = cache()->remember('navbar_categories', 3600, function () {
                                    return \App\Models\Category::withCount('products')->orderBy('name')->get();
                                });
                            @endphp
                            @forelse($mobileCategories as $cat)
                                <a href="{{ route('categories.show', $cat->slug) }}"
                                    class="flex items-center justify-between py-2 text-xs text-slate-400 hover:text-white transition-all">
                                    {{ $cat->name }}
                                    <span class="text-slate-600">{{ $cat->products_count }}</span>
                                </a>
                            @empty
                                <p class="py-2 text-xs text-slate-500">Belum ada kategori</p>
                            @endforelse
                            <a href="{{ route('categories.index') }}"
                                class="flex items-center gap-1 py-2 text-xs font-bold text-primary transition-all">
                                Lihat Semua →
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('about') }}"
                        class="group flex items-center px-6 py-3 text-sm font-bold text-slate-300 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                        <span
                            class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Tentang</span>
                    </a>
                    <a href="{{ route('contact') }}"
                        class="group flex items-center px-6 py-3 text-sm font-bold text-slate-300 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                        <span
                            class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Kontak</span>
                    </a>

                    @auth
                        @if(Auth::user()->isSeller())
                            <div class="mt-4 pt-4 border-t border-white/5">
                                <p class="px-6 text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2">Menu Vendor
                                </p>
                                <a href="{{ route('vendor.dashboard') }}"
                                    class="group flex items-center px-6 py-3 text-sm font-bold {{ request()->routeIs('vendor.dashboard') ? 'text-primary' : 'text-slate-300' }} hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                                    <span
                                        class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Dashboard
                                        Toko</span>
                                </a>
                                <a href="{{ route('shop.show', Auth::user()->vendor->slug) }}"
                                    class="group flex items-center px-6 py-3 text-sm font-bold {{ request()->routeIs('shop.show') ? 'text-primary' : 'text-slate-300' }} hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                                    <span
                                        class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Lihat
                                        Toko</span>
                                </a>
                            </div>
                        @else
                            <div class="mt-4 pt-4 border-t border-white/5">
                                <p class="px-6 text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2">Menu Akun
                                </p>
                                <a href="{{ route('dashboard') }}"
                                    class="group flex items-center px-6 py-3 text-sm font-bold {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-slate-300' }} hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300 border border-transparent hover:border-white/5 active:scale-[0.98]">
                                    <span
                                        class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Dashboard</span>
                                </a>
                            </div>
                        @endif
                    @endauth
                </nav>
            </div>

            <!-- Profile / Auth inside Drawer -->
            <div class="p-6 bg-[#111827] border-t border-white/5">
                @auth
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0ea5e9&color=fff' }}"
                            class="w-10 h-10 rounded-full border-2 border-primary/20">
                        <div class="min-w-0">
                            <p class="text-white font-black text-xs truncate">{{ Auth::user()->name }}</p>
                            <a href="{{ route('profile.edit') }}"
                                class="text-slate-500 text-[10px] font-bold uppercase tracking-widest hover:text-primary block">Profil
                                Saya</a>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center w-full py-3 bg-primary text-white font-black text-sm rounded-xl shadow-xl shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95">
                        Masuk
                    </a>
                @else
                    <form method="POST" action="{{ Auth::user()->isAdmin() ? route('admin.logout') : route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center w-full py-3 bg-red-500 text-white font-black text-sm rounded-xl shadow-xl shadow-red-500/20 hover:bg-neutral-dark transition-all active:scale-95">
                            Keluar
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</div>