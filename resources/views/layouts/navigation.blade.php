<nav
    id="main-nav"
        x-data="{ 
            showHeader: true, 
            isScrolled: false,
            lastScroll: 0
        }"
        @scroll.window.throttle.50ms="
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
        "
        class="sticky top-0 z-[999] transition-all duration-500 ease-in-out border-b"
        :class="{
            'translate-y-0': showHeader,
            '-translate-y-full shadow-none': !showHeader,
            'bg-primary shadow-lg border-white/10': isScrolled,
            'bg-primary border-white/5': !isScrolled
        }"
        x-init="$watch('open', value => {
            if (value) document.body.classList.add('overflow-hidden');
            else document.body.classList.remove('overflow-hidden');
        })">
        
        <!-- Top Bar: Socials & Language -->
        <div x-show="!isScrolled" 
             class="hidden md:block bg-[#1a365d] text-white text-[11px] font-bold uppercase tracking-widest py-1 border-b border-white/5"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4">
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
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.16c0 3.13-.75 6.17-2.66 8.57-2.05 2.53-5.27 3.54-8.38 2.62-3.11-.92-5.46-3.8-5.78-7.04-.32-3.23 1.55-6.28 4.47-7.65.62-.29 1.28-.5 1.95-.62v4.21c-.48.11-.95.3-1.39.58-1.51.96-1.95 2.95-1.04 4.5.91 1.54 2.89 2.05 4.46 1.16.89-.51 1.44-1.45 1.44-2.48v-17.1h2.85z" />
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
                <!-- Group Left: Logo -->
                <div class="flex-none flex items-center pr-2">
                    <a href="/" class="flex items-center gap-1.5 p-1.5 hover:bg-white/10 rounded-xl transition-all active:scale-95 group">
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
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center gap-2 text-white hover:text-cyan-300 transition-colors font-bold group px-3 py-1 rounded-full bg-white/10 border border-white/20">
                                        <div class="text-right leading-none">
                                            <div class="text-[9px] text-white/60 uppercase tracking-tighter">Halo,</div>
                                            <div class="text-[11px]">{{ Str::words(Auth::user()->name, 1, '') }}</div>
                                        </div>
                                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0ea5e9&color=fff' }}"
                                            class="w-7 h-7 rounded-full border border-white/40" />
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-2 bg-slate-50 border-b border-gray-100 rounded-t-xl">
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Akun
                                            Saya</p>
                                    </div>
                                    <x-dropdown-link :href="Auth::user()->isAdmin() ? route('admin.dashboard') : (Auth::user()->isSeller() ? route('vendor.dashboard') : route('dashboard'))"
                                        class="font-bold text-slate-600 hover:text-primary text-xs">Dashboard</x-dropdown-link>
                                    <x-dropdown-link :href="route('profile.edit')"
                                        class="font-bold text-slate-600 hover:text-primary text-xs">Profil</x-dropdown-link>
                                    <form method="POST"
                                        action="{{ Auth::user()->isAdmin() ? route('admin.logout') : route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="Auth::user()->isAdmin() ? route('admin.logout') : route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="text-red-500 font-bold hover:bg-red-50 text-xs">Keluar</x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
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
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
 
        <div x-show="openMobileSearch" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden px-4 pb-3">
            <form action="{{ route('products.index') }}" method="GET" class="relative group">
                <div class="relative flex items-center">
                    <input type="text" name="search" placeholder="Cari di LocalGo..."
                        class="w-full bg-white border border-white/20 rounded-xl pl-5 pr-12 py-2 text-sm text-neutral-dark placeholder-slate-400 focus:ring-2 focus:ring-white/20 transition-all">
                    <button type="submit" 
                        class="absolute right-1 top-1 bottom-1 bg-primary text-white rounded-lg px-3 flex items-center justify-center active:scale-95 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
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
<div x-show="open" 
     x-cloak
     class="fixed inset-0 z-[100000] md:hidden pointer-events-none" 
     style="display: none;">
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
        class="absolute right-0 top-0 bottom-0 w-52 bg-[#111827] h-screen flex flex-col shadow-2xl z-[100000] border-l border-white/5 overflow-y-auto pointer-events-auto">

        <!-- Header inside Drawer -->
        <div
            class="relative px-4 pt-5 pb-3 flex flex-col items-start justify-center border-b border-white/5 bg-[#111827]">
            <button @click="open = false"
                class="absolute top-2.5 right-3 w-6 h-6 rounded-lg bg-white/5 flex items-center justify-center text-white hover:bg-primary transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <span class="text-white font-bold text-[14px]">LOCAL GO</span>
            <span class="text-white/30 text-[9px] uppercase tracking-widest mt-0.5">Menu Utama</span>
        </div>

        <!-- Links -->
        <div class="flex-grow bg-[#111827] px-0">
            <nav class="flex flex-col">
                <a href="{{ route('home') }}"
                    class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                    <span class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Home</span>
                </a>
                <a href="{{ route('products.index') }}"
                    class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                    <span class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Produk</span>
                </a>
                <!-- Kategori Dropdown Mobile -->
                <div x-data="{ openKategori: false }" class="border-b border-white/5">
                    <button @click="openKategori = !openKategori"
                        class="w-full group flex items-center justify-between px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                        <span class="uppercase tracking-widest">Kategori</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-300"
                            :class="openKategori ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openKategori" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0" class="bg-black/20 py-1">
                        @foreach ($categories as $category)
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                                class="block px-8 py-1.5 text-[11px] font-bold text-slate-400 hover:text-white hover:bg-white/5 border-b border-white/5 last:border-0 transition-colors uppercase tracking-widest">
                                {{ $category->name }}
                            </a>
                        @endforeach
                        <a href="{{ route('categories.index') }}"
                            class="block px-8 py-1.5 text-[11px] font-bold text-slate-400 hover:text-white hover:bg-white/5 transition-colors uppercase tracking-widest italic decoration-primary underline-offset-4">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <a href="{{ route('about') }}"
                    class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                    <span class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Tentang</span>
                </a>
                <a href="{{ route('contact') }}"
                    class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                    <span class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Kontak</span>
                </a>

                @auth
                    <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : (Auth::user()->isSeller() ? route('vendor.dashboard') : route('dashboard')) }}"
                        class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                        <span class="w-full uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Dashboard</span>
                    </a>
                @endauth

                <!-- Vendor & Account Links -->
                @auth
                    @if (Auth::user()->vendor)
                        <div class="mt-4 pt-4 border-t border-white/10">
                            <div class="px-4 py-2 text-[10px] font-black text-white/30 uppercase tracking-[0.2em]">Menu Vendor
                            </div>
                            <a href="{{ route('vendor.dashboard') }}"
                                class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                                <span class="uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Dashboard Toko</span>
                            </a>
                            <a href="{{ route('shop.show', Auth::user()->vendor->slug) }}"
                                class="group flex items-center px-4 py-2 text-[12px] font-bold text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-300 border-b border-white/5">
                                <span class="uppercase tracking-widest group-hover:translate-x-1 transition-transform inline-block">Lihat Toko</span>
                            </a>
                        </div>
                    @endif
                @endauth
            </nav>
        </div>

        <!-- User Profile Section -->
        @auth
            <div class="mt-auto border-t border-white/10 bg-black/20 p-4">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 mb-4 group/profile">
                    <div
                        class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold text-sm shadow-lg border border-white/10 group-hover/profile:scale-105 transition-transform">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div>
                        <div class="text-[12px] font-black text-white uppercase tracking-tight group-hover/profile:text-primary transition-colors">{{ Auth::user()->name }}
                        </div>
                        <div class="text-[9px] text-white/40 uppercase tracking-widest">Lihat Profil</div>
                    </div>
                </a>
                <div class="grid grid-cols-1 gap-2">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full py-2 bg-red-500/80 hover:bg-red-500 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="mt-auto border-t border-white/10 bg-black/20 p-4">
                <p class="text-[10px] text-white/40 uppercase tracking-widest mb-4 text-center italic">Masuk untuk belanja
                    lebih seru!</p>
                <div class="grid grid-cols-1 gap-2">
                    <a href="{{ route('login') }}"
                        class="w-full py-2 bg-primary hover:bg-primary-dark text-white text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all text-center shadow-lg shadow-primary/20">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="w-full py-2 bg-white/5 border border-white/10 hover:bg-white/10 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all text-center">
                        Daftar
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>