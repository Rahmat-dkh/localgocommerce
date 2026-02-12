<div wire:ignore.self x-data="{ isOpen: false }" x-on:open-wishlist-panel.window="isOpen = true" x-show="isOpen" x-cloak
    @keydown.escape.window="isOpen = false" class="fixed inset-0 z-[1001] overflow-hidden">
    <div class="absolute inset-0 bg-neutral-dark/40 backdrop-blur-sm transition-opacity" @click="isOpen = false"></div>

    <div class="fixed top-24 right-4 md:right-20 z-[1002] flex flex-col w-full max-w-[80vw] sm:max-w-[320px]"
        style="pointer-events: auto;">
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95" class="w-full">
            <div class="flex flex-col glass border shadow-2xl rounded-3xl overflow-hidden max-h-[80vh]">
                <!-- Header -->
                <div class="p-4 border-b border-neutral-dark/5 bg-white/50 relative overflow-hidden">
                    <div class="flex items-center justify-between relative z-10">
                        <div>
                            <h2 class="text-lg font-black text-neutral-dark tracking-tighter">Favorit <span
                                    class="text-red-500 italic">Saya</span></h2>
                            <p class="text-[10px] text-neutral-dark/50 font-bold mt-0.5">Simpan sekarang, beli nanti!
                            </p>
                        </div>
                        <button @click="isOpen = false"
                            class="p-1 text-neutral-dark/40 hover:text-red-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Items -->
                <div class="flex-grow overflow-y-auto p-4 sm:p-5 space-y-3">
                    @forelse($wishlists as $wishlist)
                        <div
                            class="flex gap-3 p-3 bg-white/50 rounded-2xl border border-neutral-dark/5 group hover:border-red-500/20 transition-all">
                            <div
                                class="w-14 h-14 sm:w-16 sm:h-16 bg-red-50 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-grow min-w-0">
                                <h4 class="font-bold text-sm text-neutral-dark tracking-tight leading-tight line-clamp-2">
                                    {{ $wishlist['product']['name'] ?? 'Produk' }}
                                </h4>
                                <div class="text-[10px] font-bold text-neutral-dark/40 mt-0.5 uppercase tracking-widest">
                                    {{ $wishlist['product']['category']['name'] ?? 'Kategori' }}
                                </div>
                                <div class="mt-1 text-sm font-black text-red-500 tracking-tighter">Rp
                                    {{ number_format($wishlist['product']['price'] ?? 0, 0, ',', '.') }}
                                </div>
                                <a href="{{ route('products.show', $wishlist['product']['id']) }}"
                                    class="mt-1 inline-block text-[10px] font-bold text-primary hover:text-primary-dark transition-colors">
                                    Lihat Produk →
                                </a>
                            </div>
                            <button wire:click="removeItem({{ $wishlist['id'] }})"
                                class="self-start p-0.5 text-neutral-dark/20 hover:text-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div
                                class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-slate-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-sm font-black text-neutral-dark/60 mb-1">Belum Ada Favorit</p>
                            <p class="text-xs font-medium text-neutral-dark/40">Mulai tambahkan produk favoritmu!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Footer -->
                <div class="p-4 sm:p-5 border-t border-neutral-dark/5 bg-white/50">
                    <div class="text-center mb-3">
                        <p class="text-[10px] font-black text-neutral-dark/40 uppercase tracking-widest">Total Favorit
                        </p>
                        <p class="text-xl sm:text-2xl font-black text-red-500 tracking-tighter">{{ count($wishlists) }}
                            Item</p>
                    </div>
                    <a href="{{ route('products.index') }}" @click="isOpen = false"
                        class="w-full h-11 sm:h-12 bg-red-500 text-white font-bold text-sm rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30 hover:bg-red-600 transition-all active:scale-95">
                        Jelajahi Produk Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>