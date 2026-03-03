<div>
    @if($variant === 'text')
        <button wire:click="addToCart"
            class="w-full h-12 lg:h-14 px-4 sm:px-6 bg-white border border-slate-200 rounded-[1.25rem] font-black text-neutral-dark hover:bg-slate-50 transition-all flex items-center justify-center gap-2 text-xs sm:text-base shadow-xl shadow-slate-200/60 active:scale-95 relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="addToCart"
                class="absolute inset-0 bg-white/80 flex items-center justify-center z-10">
                <svg class="w-6 h-6 animate-spin text-innovation" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            @if($isAdded)
                <svg class="w-5 h-5 animate-ping text-growth" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-xs sm:text-sm">Berhasil</span>
            @else
                <svg class="w-5 h-5 text-neutral-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span class="text-xs sm:text-sm text-neutral-dark">Masukkan Keranjang</span>
            @endif
        </button>
    @elseif($variant === 'buy')
        <button wire:click="buyNow"
            class="w-full h-12 lg:h-14 bg-primary hover:bg-neutral-dark text-white rounded-[1.25rem] flex items-center justify-center gap-2 text-xs sm:text-base font-black transition-all shadow-xl shadow-primary/40 hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1 active:scale-95 relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="buyNow"
                class="absolute inset-0 bg-primary flex items-center justify-center z-10">
                <svg class="w-6 h-6 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            <span>Beli Sekarang</span>
        </button>
    @elseif($variant === 'mini')
        <button wire:click="addToCart"
            class="h-12 px-5 bg-primary text-white rounded-xl flex items-center gap-2 font-bold shadow-xl shadow-primary/30 hover:scale-105 active:scale-95 transition-all relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="addToCart"
                class="absolute inset-0 bg-primary flex items-center justify-center z-10">
                <svg class="w-4 h-4 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            @if($isAdded)
                <svg class="w-5 h-5 animate-ping" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm">Oke</span>
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span class="text-sm">Beli</span>
            @endif
        </button>
    @else
        <button wire:click="addToCart"
            class="w-10 h-10 sm:w-11 sm:h-11 bg-primary text-white rounded-xl flex items-center justify-center transition-all duration-300 shadow-lg shadow-primary/20 hover:bg-primary-dark hover:scale-110 active:scale-95 group/btn relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="addToCart"
                class="absolute inset-0 bg-primary flex items-center justify-center z-10">
                <svg class="w-4 h-4 md:w-5 md:h-5 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            @if($isAdded)
                <svg class="w-5 h-5 md:w-6 md:h-6 animate-ping" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            @else
                <svg class="w-5 h-5 md:w-6 md:h-6 transition-transform group-hover/btn:scale-110" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            @endif
        </button>
    @endif
</div>