<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
            {{ __('Dashboard Akun') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-10 bg-slate-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Welcome Banner -->
            <div class="bg-white rounded-[2rem] p-6 sm:p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row items-center gap-8 mb-8 overflow-hidden relative"
                data-aos="fade-down">
                <div class="relative z-10 text-center md:text-left" data-aos="fade-right" data-aos-delay="200">
                    <h1 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">Halo,
                        {{ Auth::user()->name }}! 👋
                    </h1>
                    <p class="text-slate-500 text-sm font-medium max-w-lg mb-8">Selamat datang di dashboard akun Anda.
                        Di sini Anda bisa melihat status pesanan, mengatur profil, dan lainnya.</p>

                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="{{ route('orders.index') }}"
                            class="px-6 py-3 bg-primary text-white font-black rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95 text-xs uppercase tracking-widest">
                            Lihat Pesanan Saya
                        </a>
                        <a href="{{ route('profile.edit') }}"
                            class="px-6 py-3 bg-slate-100 text-slate-600 font-black rounded-xl hover:bg-slate-200 transition-all active:scale-95 text-xs uppercase tracking-widest">
                            Edit Profil
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block relative z-10">
                    <div class="relative w-40 h-40">
                        <div class="absolute inset-0 bg-primary/5 rounded-full animate-pulse"></div>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0ea5e9&color=fff&size=512"
                            class="w-full h-full rounded-full border-4 border-white shadow-xl relative z-10 object-cover">
                    </div>
                </div>

                <!-- Abstract Decorations -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-blue-500/5 rounded-full blur-2xl"></div>
            </div>

            <!-- Vendor Access Banner (Conditional) -->
            @if(Auth::user()->isSeller())
                <div class="bg-neutral-dark rounded-[2.5rem] p-8 mb-8 text-white relative overflow-hidden group">
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-primary shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-black tracking-tight">Kelola Tenant Kuliner Anda</h3>
                                <p class="text-slate-400 text-sm font-medium">Buka menu dashboard khusus tenant untuk
                                    mengelola produk kuliner dan pesanan Anda.</p>
                            </div>
                        </div>
                        <a href="{{ route('vendor.dashboard') }}"
                            class="w-full md:w-auto px-8 py-4 bg-primary text-white font-black rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95 text-sm text-center">
                            Buka Dashboard Vendor &rarr;
                        </a>
                    </div>
                    <!-- Hover Effect Decoration -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                </div>
            @else
                <div class="bg-blue-600 rounded-[2.5rem] p-8 mb-8 text-white relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div>
                            <h3 class="text-xl font-black tracking-tight">Punya Bisnis Kuliner?</h3>
                            <p class="text-blue-100 text-sm font-medium">Mulai berjualan di Sini Jajan dan kembangkan cita
                                rasa Anda hari ini!</p>
                        </div>
                        <a href="{{ route('vendor.register') }}"
                            class="w-full md:w-auto px-8 py-4 bg-white text-blue-600 font-black rounded-2xl shadow-lg transition-all active:scale-95 text-sm text-center">
                            Jadi Tenant Sekarang
                        </a>
                    </div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                </div>
            @endif

            <!-- Account Summary / Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('orders.index') }}"
                    class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md hover:border-primary/20 transition-all group"
                    data-aos="zoom-in" data-aos-delay="400">
                    <div
                        class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 group-hover:bg-primary/5 group-hover:text-primary flex items-center justify-center mb-3 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Pesanan Aktif</p>
                    <h4 class="text-xl font-black text-slate-800">
                        {{ auth()->user()->orders()->where('status', 'pending')->count() }}
                    </h4>
                </a>
                <button onclick="window.dispatchEvent(new CustomEvent('open-wishlist-panel'))"
                    class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md hover:border-rose-500/20 transition-all group"
                    data-aos="zoom-in" data-aos-delay="500">
                    <div
                        class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 group-hover:bg-rose-50 group-hover:text-rose-500 flex items-center justify-center mb-3 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Wishlist</p>
                    <h4 class="text-xl font-black text-slate-800">{{ auth()->user()->wishlists()->count() }}</h4>
                </button>
                <a href="{{ route('addresses.index') }}"
                    class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md hover:border-blue-500/20 transition-all group"
                    data-aos="zoom-in" data-aos-delay="600">
                    <div
                        class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-500 flex items-center justify-center mb-3 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Alamat Tersimpan</p>
                    <h4 class="text-xl font-black text-slate-800">{{ auth()->user()->addresses->count() }}</h4>
                </a>
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center"
                    data-aos="zoom-in" data-aos-delay="700">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Ulasan</p>
                    <h4 class="text-xl font-black text-slate-800">{{ auth()->user()->reviews()->count() }}</h4>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>