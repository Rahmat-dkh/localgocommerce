<div>
    @if($variant === 'text')
        <button wire:click="addToCart"
            class="w-full sm:w-auto h-14 sm:h-16 px-8 sm:px-12 glass rounded-[1.5rem] font-black text-neutral-dark hover:bg-white transition-all flex items-center justify-center gap-3 text-base sm:text-lg shadow-lg relative overflow-hidden">
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
                <svg class="w-6 h-6 animate-ping text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>Terpasang</span>
            @else
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span>Beli Sekarang</span>
            @endif
        </button>
    @elseif($variant === 'mini')
        <button wire:click="addToCart"
            class="h-12 px-5 bg-innovation text-white rounded-xl flex items-center gap-2 font-bold shadow-lg shadow-innovation/20 hover:scale-105 active:scale-95 transition-all relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="addToCart"
                class="absolute inset-0 bg-innovation flex items-center justify-center z-10">
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
            class="w-7 h-7 sm:w-10 sm:h-10 bg-innovation text-white rounded-[0.5rem] flex items-center justify-center transition-all duration-300 shadow-lg shadow-innovation/30 hover:bg-innovation-dark hover:scale-110 active:scale-95 group/btn relative overflow-hidden">
            <!-- Loading State -->
            <div wire:loading wire:target="addToCart"
                class="absolute inset-0 bg-innovation flex items-center justify-center z-10">
                <svg class="w-3 h-3 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            @if($isAdded)
                <svg class="w-3 h-3 animate-ping" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            @else
                <svg class="w-3 h-3 transition-transform group-hover/btn:rotate-90" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                </svg>
            @endif
        </button>
    @endif
</div>