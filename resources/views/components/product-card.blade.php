@props(['product'])

<div data-aos="fade-up" class="group relative flex flex-col h-full">
    <!-- Image Area -->
    <div
        class="relative aspect-square rounded-[1.5rem] sm:rounded-[2.5rem] overflow-hidden bg-neutral-dark/5 transition-all duration-700 group-hover:bg-primary/5 shadow-inner">
        <!-- Floating Tag -->
        <div class="absolute top-3 left-3 z-20">
            <span
                class="glass px-3 py-1 text-[10px] font-black uppercase tracking-widest text-primary rounded-lg overflow-hidden block">
                {{ $product->category->name }}
            </span>
        </div>

        <!-- Wishlist Button -->
        <div class="absolute top-3 right-3 z-20">
            <livewire:wishlist-button :product-id="$product->id" :key="'wishlist-' . $product->id" />
        </div>

        <!-- Action Overlay -->
        <div
            class="absolute inset-0 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-primary/20 flex items-center justify-center">
            <a href="{{ route('products.show', $product->id) }}"
                class="btn-primary flex items-center gap-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 scale-90 group-hover:scale-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
                Detail
            </a>
        </div>

        <!-- Product Image or Placeholder -->
        <div
            class="h-full w-full flex items-center justify-center text-primary/10 transition-transform duration-700 group-hover:scale-110">
            @if($product->image_url)
                <img src="{{ Str::startsWith($product->image_url, 'http') ? $product->image_url : $product->image_url }}"
                    alt="{{ $product->name }}" class="w-full h-full object-cover">
            @else
                <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            @endif
        </div>
    </div>

    <!-- Content Area -->
    <div class="mt-3 sm:mt-8 px-1 sm:px-2 flex-grow">
        <div class="flex items-center gap-2 sm:gap-4 mb-2 sm:mb-3">
            <span
                class="px-2 py-0.5 sm:px-3 sm:py-1 bg-innovation/10 text-innovation text-[9px] sm:text-[10px] font-black uppercase rounded-md sm:rounded-lg">UMKM</span>
            <span
                class="text-[9px] sm:text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ now()->format('d/m/Y') }}</span>
        </div>
        <h3
            class="text-sm sm:text-lg font-black text-slate-900 tracking-tight leading-tight group-hover:text-primary transition-colors mb-2 sm:mb-3 line-clamp-2">
            {{ $product->name }}
        </h3>

        <a href="{{ route('products.show', $product->id) }}"
            class="inline-block text-[15px] font-bold text-slate-900 border-b-2 border-slate-900/5 hover:border-primary hover:text-primary transition-all pb-1">
            Lihat Produk
        </a>
    </div>

    <!-- Footer Area -->
    <div class="mt-4 sm:mt-8 px-1 sm:px-2 flex items-center justify-between pt-4 sm:pt-6 border-t border-gray-50">
        <div class="flex flex-col">
            <span class="text-lg sm:text-2xl font-black text-slate-900 tracking-tight">
                <span class="text-[10px] sm:text-sm font-bold vertical-align-top">Rp</span>
                {{ number_format($product->price, 0, ',', '.') }}
            </span>
        </div>

        <!-- Animated Add Button -->
        <livewire:add-to-cart-button :product-id="$product->id" :key="'add-btn-' . $product->id" />
    </div>
</div>