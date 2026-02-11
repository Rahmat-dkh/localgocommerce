<div wire:ignore.self x-data="{ isOpen: false }" x-on:open-cart-panel.window="isOpen = true" x-show="isOpen" x-cloak
    @keydown.escape.window="isOpen = false" class="fixed inset-0 z-[1001] overflow-hidden">
    <div class="absolute inset-0 bg-neutral-dark/40 backdrop-blur-sm transition-opacity" @click="isOpen = false"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex">
        <div x-show="isOpen" x-transition:enter="transform transition ease-in-out duration-500"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full" class="w-screen max-w-sm">
            <div class="h-full flex flex-col glass border-l shadow-2xl">
                <!-- Header -->
                <div class="p-4 sm:p-5 border-b border-neutral-dark/5 flex items-center justify-between">
                    <h2 class="text-xl sm:text-2xl font-black text-neutral-dark tracking-tighter">Keranjang <span
                            class="text-primary italic">Saya</span></h2>
                    <button @click="isOpen = false"
                        class="p-1.5 text-neutral-dark/40 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Items -->
                <div class="flex-grow overflow-y-auto p-3 sm:p-4 space-y-3">
                    @forelse($cart as $id => $item)
                        <div class="flex gap-3 p-3 bg-white/50 rounded-2xl border border-neutral-dark/5 group relative">
                            <div
                                class="w-16 h-16 sm:w-18 sm:h-18 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-neutral-dark/5 shrink-0">
                                @php
                                    $imagePath = $item['image'];
                                    $src = '';
                                    if ($imagePath) {
                                        if (str_starts_with($imagePath, 'http')) {
                                            $src = $imagePath;
                                        } elseif (str_starts_with($imagePath, 'products/')) {
                                            $src = asset('storage/' . $imagePath);
                                        } elseif (file_exists(public_path($imagePath))) {
                                            $src = asset($imagePath);
                                        } else {
                                            $src = asset('storage/' . $imagePath);
                                        }
                                    }
                                @endphp
                                @if($src)
                                    <img src="{{ $src }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-6 h-6 text-neutral-dark/20" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-grow flex flex-col justify-between min-w-0">
                                <div>
                                    <h4
                                        class="font-bold text-sm text-neutral-dark tracking-tight leading-tight line-clamp-2">
                                        {{ $item['name'] }}
                                    </h4>
                                    <div class="mt-0.5 text-xs font-black text-primary tracking-tighter relative">
                                        <span wire:loading.remove
                                            wire:target="updateQuantity({{ $id }}, 'increase'), updateQuantity({{ $id }}, 'decrease')">
                                            Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                        </span>
                                        <span wire:loading
                                            wire:target="updateQuantity({{ $id }}, 'increase'), updateQuantity({{ $id }}, 'decrease')"
                                            class="text-neutral-dark/40 text-xs">
                                            Updating...
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-1.5">
                                    <div
                                        class="flex items-center gap-3 bg-white border border-neutral-dark/10 rounded-xl px-2 py-1 shadow-sm relative overflow-hidden">
                                        <!-- Loading Overlay -->
                                        <div wire:loading
                                            wire:target="updateQuantity({{ $id }}, 'decrease'), updateQuantity({{ $id }}, 'increase')"
                                            class="absolute inset-0 bg-white/80 flex items-center justify-center z-10">
                                            <svg class="w-4 h-4 animate-spin text-primary" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                        </div>

                                        <button wire:click="updateQuantity({{ $id }}, 'decrease')"
                                            class="p-1 text-neutral-dark/40 hover:text-primary transition-colors disabled:opacity-50">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <span
                                            class="text-sm font-bold text-neutral-dark min-w-[1.5rem] text-center">{{ $item['quantity'] }}</span>
                                        <button wire:click="updateQuantity({{ $id }}, 'increase')"
                                            class="p-1 text-neutral-dark/40 hover:text-primary transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button wire:click="removeItem({{ $id }})"
                                class="absolute top-2 right-2 p-1.5 bg-red-50 text-red-500 rounded-lg hover:bg-red-100 transition-colors opacity-0 group-hover:opacity-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div
                                class="w-14 h-14 sm:w-16 sm:h-16 bg-neutral-dark/5 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-7 h-7 sm:w-8 sm:h-8 text-neutral-dark/20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <p class="text-neutral-dark/40 font-bold text-sm">Keranjang kosong.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Footer -->
                @if(count($cart) > 0)
                    <div class="p-4 sm:p-5 border-t border-neutral-dark/5 bg-white/30 backdrop-blur-md">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <div class="text-[10px] font-black text-neutral-dark/40 uppercase tracking-[0.2em] mb-0.5">
                                    Total
                                    Pembayaran</div>
                                <div class="text-xl sm:text-2xl font-black text-neutral-dark tracking-tight">
                                    <span wire:loading.remove wire:target="updateQuantity, removeItem">
                                        Rp {{ number_format($this->total, 0, ',', '.') }}
                                    </span>
                                    <span wire:loading wire:target="updateQuantity, removeItem"
                                        class="text-sm text-neutral-dark/50">
                                        Calculating...
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('checkout') }}"
                            class="w-full h-11 sm:h-12 bg-growth hover:bg-growth-dark text-white rounded-2xl flex items-center justify-center gap-2 text-sm font-bold transition-all shadow-lg shadow-growth/30 hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Checkout Now
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>