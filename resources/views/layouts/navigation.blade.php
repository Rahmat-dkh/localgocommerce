<nav id="main-nav" x-data="{ 
            showHeader: true, 
            isScrolled: false,
            lastScroll: 0
        }" @scroll.window.throttle.50ms="
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            
            // Scrolled state for styling
            isScrolled = currentScroll > 40;
 
            // Smart hide/show logic for desktop
            if (window.innerWidth >= 1024) {
                if (currentScroll > lastScroll && currentScroll > 200) {
                    showHeader = false; // Scrolling down
                } else {
                    showHeader = true; // Scrolling up or near top
                }
            } else {
                showHeader = true;
            }
            lastScroll = currentScroll;
        " class="sticky top-0 z-[999] transition-all duration-500 ease-in-out border-b" :class="{
            'translate-y-0': showHeader,
            '-translate-y-full shadow-none': !showHeader,
            'bg-primary shadow-lg border-white/10': isScrolled,
            'bg-primary border-white/5': !isScrolled
        }" x-init="$watch('open', value => {
            if (value) document.body.classList.add('overflow-hidden');
            else document.body.classList.remove('overflow-hidden');
        })">

    <!-- Top Bar: Socials & Language -->
    <div x-show="!isScrolled"
        class="hidden md:block bg-[#1a365d] text-white text-[11px] font-bold uppercase tracking-widest py-1 border-b border-white/5"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <!-- Left: Social Media Icons -->
            <div class="flex items-center gap-4">
                <span class="text-white/50 hidden md:inline">Ikuti Kami:</span>
                <a href="https://instagram.com" target="_blank"
                    class="flex items-center gap-1 hover:text-cyan-400 transition-colors group">
                    <svg class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <a href="https://tiktok.com" target="_blank"
                    class="flex items-center gap-1 hover:text-cyan-400 transition-colors group">
                    <svg class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.16c0 3.13-.75 6.17-2.66 8.57-2.05 2.53-5.27 3.54-8.38 2.62-3.11-.92-5.46-3.8-5.78-7.04-.32-3.23 1.55-6.28 4.47-7.65.62-.29 1.28-.5 1.95-.62v4.21c-.48.11-.95.3-1.39.58-1.51.96-1.95 2.95-1.04 4.5.91 1.54 2.89 2.05 4.46 1.16.89-.51 1.44-1.45 1.44-2.48v-171h2.85z" />
                    </svg>
                </a>
                <a href="https://youtube.com" target="_blank"
                    class="flex items-center gap-1 hover:text-cyan-400 transition-colors group">
                    <svg class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>
            </div>

            <!-- Right: Language Switcher -->
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5 cursor-pointer hover:text-cyan-400 transition-colors">
                    <!-- Globe Icon -->
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <a href="{{ route('lang.switch', 'id') }}"
                        class="{{ app()->getLocale() == 'id' ? 'font-black text-white' : 'font-medium text-white/50 hover:text-white' }} transition-colors">ID</a>
                    <span class="text-white/30">|</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="{{ app()->getLocale() == 'en' ? 'font-black text-white' : 'font-medium text-white/50 hover:text-white' }} transition-colors">EN</a>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-2 md:gap-8 transition-all duration-700 ease-in-out"
            :class="isScrolled ? 'h-12 md:h-11' : 'h-14 md:h-14'">
            <!-- Drawer Toggle & Logo Mobile (Aligned Left) -->
            <div class="flex items-center gap-2.5 md:hidden">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group shrink-0">
                    <img src="{{ asset('images/logo_lokarasa.png') }}" class="h-8 w-auto rounded-lg" alt="LocalGo Logo">
                    <span class="text-white font-black text-base tracking-tight uppercase">Local<span
                            class="text-white/80">Go</span></span>
                </a>
            </div>
            <!-- Group Left: Logo (Desktop) -->
            <div class="flex-none flex items-center pr-2 hidden md:flex">
                <a href="/"
                    class="flex items-center gap-1.5 p-1.5 hover:bg-white/10 rounded-xl transition-all active:scale-95 group">
                    <img src="{{ asset('images/logo_lokarasa.png') }}" alt="LocalGo"
                        class="w-auto object-contain rounded-lg transition-all duration-500"
                        :class="isScrolled ? 'h-7 md:h-7' : 'h-8 md:h-8'">
                    <span class="text-white font-black text-sm md:text-xl tracking-tighter">
                        Local<span class="text-white/80">Go</span>
                    </span>
                </a>
            </div>

            <!-- Group Center: Centered Search Bar (Desktop Only) -->
            <div class="hidden md:flex flex-grow justify-center px-4 pt-3">
                <div class="w-full max-w-xl">
                    <form action="{{ route('products.index') }}" method="GET" class="relative group w-full">
                        <div class="relative flex items-center">
                            <input type="text" name="search" placeholder="Cari di LocalGo..."
                                class="w-full bg-white border border-white/30 rounded-xl pl-6 pr-14 py-2 text-sm text-neutral-dark placeholder-slate-400 focus:ring-2 focus:ring-white/20 transition-all duration-300">
                            <button type="submit"
                                class="absolute right-1.5 top-1.5 bottom-1.5 bg-primary text-white hover:bg-neutral-dark rounded-lg px-4 mb-0 transition-all duration-300 flex items-center justify-center">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Group Right: Auth & Mobile Controls -->
            <div class="flex-none flex items-center justify-end md:w-48">
                <!-- Desktop Auth -->
                <div class="hidden md:flex items-center gap-2">
                    @auth
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center gap-2 text-white hover:text-cyan-300 transition-all duration-300 font-medium group px-2 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10">
                                <span class="text-[11px] font-bold">{{ Str::words(Auth::user()->name, 1, '') }}</span>
                                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0ea5e9&color=fff' }}"
                                    class="w-6 h-6 rounded-full border border-white/20" />
                            </a>

                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                                style="display: none;">
                                <div class="px-4 py-2 bg-slate-50 border-b border-gray-100">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Akun Saya</p>
                                </div>
                                <x-dropdown-link :href="Auth::user()->isAdmin() ? route('admin.dashboard') : (Auth::user()->isSeller() ? route('vendor.dashboard') : route('dashboard'))"
                                    class="block px-4 py-2 text-xs font-bold text-slate-600 hover:text-primary hover:bg-primary/5 transition-colors">
                                    Dashboard
                                </x-dropdown-link>
                                <form method="POST"
                                    action="{{ Auth::user()->isAdmin() ? route('admin.logout') : route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="Auth::user()->isAdmin() ? route('admin.logout') : route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-50 transition-colors">
                                        Keluar
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-1.5 text-xs font-black text-white rounded-full border-2 border-white hover:bg-white hover:text-primary transition-all duration-300">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-1.5 text-xs font-black text-primary bg-white rounded-full border-2 border-white hover:bg-primary-dark hover:text-white transition-all duration-300">
                            Daftar
                        </a>
                    @endauth
                </div>

                <!-- Mobile Icons Group (Always on Right) -->
                <div class="flex md:hidden items-center gap-0.5">
                    <!-- Search Toggle (Far Left of Group) -->
                    <button @click="openMobileSearch = !openMobileSearch"
                        class="text-white w-9 h-9 flex items-center justify-center hover:bg-white/10 rounded-full transition-all active:scale-95 shrink-0">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Wishlist -->
                    <div class="relative group text-white shrink-0 scale-90">
                        <livewire:wishlist-icon />
                    </div>

                    <!-- Cart -->
                    <div class="relative group text-white shrink-0 scale-90">
                        <livewire:cart-counter />
                    </div>

                    <!-- Menu Hamburger -->
                    <button @click="open = ! open"
                        class="w-9 h-9 text-white hover:text-cyan-400 hover:bg-white/10 active:scale-95 transition-all duration-300 flex items-center justify-center rounded-full shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="openMobileSearch" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        class="md:hidden px-4 pb-3">
        <form action="{{ route('products.index') }}" method="GET" class="relative group">
            <div class="relative flex items-center">
                <input type="text" name="search" placeholder="Cari di LocalGo..."
                    class="w-full bg-white border border-white/20 rounded-xl pl-5 pr-12 py-2 text-sm text-neutral-dark placeholder-slate-400 focus:ring-2 focus:ring-white/20 transition-all">
                <button type="submit"
                    class="absolute right-1 top-1 bottom-1 bg-primary text-white rounded-lg px-3 flex items-center justify-center active:scale-95 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Row 2: Navigation Links & Icons (Desktop) -->
    <div class="hidden md:flex items-center px-4 sm:px-6 lg:px-8 transition-all duration-700 ease-in-out border-t border-white/5"
        :class="isScrolled ? 'h-9' : 'h-11'">
        <!-- Left: Categories -->
        <div class="flex-none w-48">
            <!-- Categories -->
            <div x-data="{ openCategory: false }" class="relative" @click.away="openCategory = false">
                <button @click="openCategory = !openCategory"
                    class="flex items-center gap-2 px-4 py-1.5 text-sm font-bold text-white rounded-full transition-all duration-300 hover:bg-white/10 active:scale-95 bg-white/5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Kategori
                </button>
                <!-- Dropdown -->
                <div x-show="openCategory" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="absolute left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
                    <div class="max-h-80 overflow-y-auto py-2">
                        @php
                            $categories = cache()->remember('navbar_categories', 3600, function () {
                                return \App\Models\Category::withCount('products')->orderBy('name')->get();
                            });
                        @endphp
                        @foreach($categories as $category)
                            <a href="{{ route('categories.show', $category->slug) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Center: Main Navigation -->
        <div class="flex-grow flex justify-center px-4">
            <div class="flex items-center gap-1 lg:gap-2">
                <a href="{{ route('home') }}"
                    class="relative px-4 py-1 text-sm font-bold text-white rounded-full transition-all duration-300 hover:bg-white/10 hover:text-cyan-300 whitespace-nowrap group {{ request()->routeIs('home') ? 'text-cyan-300' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('products.index') }}"
                    class="relative px-4 py-1 text-sm font-bold text-white rounded-full transition-all duration-300 hover:bg-white/10 hover:text-cyan-300 whitespace-nowrap group {{ request()->routeIs('products.*') ? 'text-cyan-300' : '' }}">
                    Produk
                </a>
                <a href="{{ route('about') }}"
                    class="relative px-4 py-1 text-sm font-bold text-white rounded-full transition-all duration-300 hover:bg-white/10 hover:text-cyan-300 whitespace-nowrap group {{ request()->routeIs('about') ? 'text-cyan-300' : '' }}">
                    Tentang
                </a>
                <a href="{{ route('contact') }}"
                    class="relative px-4 py-1 text-sm font-bold text-white rounded-full transition-all duration-300 hover:bg-white/10 hover:text-cyan-300 whitespace-nowrap group {{ request()->routeIs('contact') ? 'text-cyan-300' : '' }}">
                    Kontak
                </a>
            </div>
        </div>

        <!-- Right: Icons -->
        <div class="flex-none w-48 flex items-center justify-end gap-6">
            <div class="relative group">
                <livewire:wishlist-icon />
            </div>
            <div class="relative group">
                <livewire:cart-counter />
            </div>
        </div>
    </div>
</nav>

<!-- Mobile menu Drawer -->
<div x-show="open" x-cloak class="fixed inset-0 z-[100000] md:hidden pointer-events-none">
    <!-- Backdrop (Transparent as requested) -->
    <div x-show="open" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false"
        class="absolute inset-0 bg-transparent pointer-events-auto z-[99999]"></div>

    <!-- Drawer Content -->
    <div x-show="open" x-transition:enter="transition ease-out duration-500 transform"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-400 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="absolute right-0 top-0 bottom-0 w-48 bg-white h-screen flex flex-col shadow-2xl z-[100000] border-l border-slate-200 overflow-y-auto pointer-events-auto">

        <!-- Header inside Drawer -->
        <div class="px-5 pt-6 pb-4 border-b border-slate-200 bg-slate-50/50">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo_lokarasa.png') }}" class="w-7 h-7 rounded-lg shadow-sm"
                        alt="LocalGo">
                    <span class="text-slate-950 font-black text-base tracking-tighter">Local<span
                            class="text-primary">Go</span></span>
                </div>
                <button @click="open = false"
                    class="w-8 h-8 rounded-lg bg-slate-200/50 flex items-center justify-center text-slate-500 hover:text-slate-900 hover:bg-slate-200 transition-all active:scale-95 border border-slate-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <span class="text-slate-400 text-[9px] uppercase font-bold tracking-[0.2em]">Menu Utama</span>
        </div>

        <!-- Links -->
        <div class="flex-grow bg-white px-0">
            <nav class="flex flex-col py-1">
                <a href="{{ route('home') }}"
                    class="group flex items-center px-5 py-3 text-[13px] font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 border-b border-slate-200 {{ request()->routeIs('home') ? 'bg-slate-50 border-l-4 border-l-primary text-primary font-black' : 'border-l-4 border-l-transparent' }}">
                    <span
                        class="uppercase tracking-widest group-hover:translate-x-1 transition-transform">Beranda</span>
                </a>
                <a href="{{ route('products.index') }}"
                    class="group flex items-center px-5 py-3 text-[13px] font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 border-b border-slate-200 {{ request()->routeIs('products.*') ? 'bg-slate-50 border-l-4 border-l-primary text-primary font-black' : 'border-l-4 border-l-transparent' }}">
                    <span class="uppercase tracking-widest group-hover:translate-x-1 transition-transform">Produk</span>
                </a>
                <!-- Kategori Dropdown Mobile -->
                <div x-data="{ openKategori: false }" class="border-b border-slate-200">
                    <button @click="openKategori = !openKategori"
                        class="w-full group flex items-center justify-between px-5 py-3 text-[13px] font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300"
                        :class="openKategori ? 'bg-slate-50' : ''">
                        <span class="uppercase tracking-widest">Kategori</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-300"
                            :class="openKategori ? 'rotate-180 text-primary' : 'text-slate-400'" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openKategori" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-slate-50/50 py-0.5 shadow-inner border-l-4 border-l-primary/10">
                        @foreach ($categories as $category)
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                                class="block px-7 py-3 text-xs font-bold text-slate-500 hover:text-primary hover:bg-slate-100/50 border-b border-slate-200 last:border-0 transition-colors uppercase tracking-widest">
                                {{ $category->name }}
                            </a>
                        @endforeach
                        <a href="{{ route('categories.index') }}"
                            class="block px-7 py-3 text-xs font-bold text-slate-400 hover:text-primary hover:bg-slate-100/50 transition-colors uppercase tracking-widest italic">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <a href="{{ route('about') }}"
                    class="group flex items-center px-5 py-3 text-[13px] font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 border-b border-slate-200 {{ request()->routeIs('about') ? 'bg-slate-50 border-l-4 border-l-primary text-primary font-black' : 'border-l-4 border-l-transparent' }}">
                    <span
                        class="uppercase tracking-widest group-hover:translate-x-1 transition-transform">Tentang</span>
                </a>
                <a href="{{ route('contact') }}"
                    class="group flex items-center px-5 py-3 text-[13px] font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 border-b border-slate-200 {{ request()->routeIs('contact') ? 'bg-slate-50 border-l-4 border-l-primary text-primary font-black' : 'border-l-4 border-l-transparent' }}">
                    <span class="uppercase tracking-widest group-hover:translate-x-1 transition-transform">Kontak</span>
                </a>

                <!-- User Section -->
                @auth
                    <div class="mt-6 px-5 pb-10">
                        <div class="text-slate-400 text-[9px] uppercase font-black tracking-[0.2em] mb-3">Akun Saya</div>

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-200 hover:bg-slate-100 transition-all group/profile mb-3">
                            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0ea5e9&color=fff' }}"
                                class="w-9 h-9 rounded-lg border border-slate-200 group-hover/profile:border-primary/20 transition-all shadow-sm" />
                            <div class="overflow-hidden">
                                <div
                                    class="text-xs font-bold text-slate-900 truncate group-hover/profile:text-primary transition-colors">
                                    {{ Auth::user()->name }}</div>
                                <div class="text-[9px] text-slate-400 uppercase tracking-widest mt-0.5">Edit Profil</div>
                            </div>
                        </a>

                        <div class="space-y-0.5">
                            <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : (Auth::user()->isSeller() ? route('vendor.dashboard') : route('dashboard')) }}"
                                class="group flex items-center justify-between py-2.5 text-xs font-bold text-slate-600 hover:text-primary transition-colors uppercase tracking-widest border-b border-slate-200">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="mt-0.5">
                                @csrf
                                <button type="submit"
                                    class="group w-full flex items-center justify-between py-2.5 text-xs font-bold text-red-500 hover:text-red-600 transition-colors uppercase tracking-widest text-left">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="mt-6 px-5 pb-10">
                        <div class="grid grid-cols-1 gap-3">
                            <a href="{{ route('login') }}"
                                class="w-full py-3.5 bg-primary hover:bg-primary-dark text-white text-[11px] font-bold uppercase tracking-[0.2em] rounded-xl transition-all text-center shadow-lg shadow-primary/10 active:scale-[0.98]">
                                Masuk Akun
                            </a>
                            <a href="{{ route('register') }}"
                                class="w-full py-3.5 bg-white border border-slate-200 hover:border-primary/20 text-slate-900 text-[11px] font-bold uppercase tracking-[0.2em] rounded-xl transition-all text-center active:scale-[0.98]">
                                Daftar Baru
                            </a>
                        </div>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</div>