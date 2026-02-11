@props(['product'])

<div data-aos="fade-up"
    class="group relative flex flex-col h-full bg-white border border-gray-300 rounded-[1.5rem] p-2 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300">
    <!-- Main Stretched Link -->
    <a href="{{ route('products.show', $product->id) }}" class="absolute inset-0 z-10"
        aria-label="{{ $product->name }}"></a>

    <!-- Image Area -->
    <div
        class="relative aspect-square rounded-[1.5rem] sm:rounded-[2.5rem] overflow-hidden bg-neutral-dark/5 transition-all duration-700 group-hover:bg-primary/5 shadow-inner">
        <!-- Floating Tag -->
        <div class="absolute top-2 left-2 z-20">
            <span
                class="glass px-1.5 py-0.5 text-[8px] font-black uppercase tracking-wider text-primary rounded-md overflow-hidden block">
                {{ $product->category->name }}
            </span>
        </div>

        <!-- Wishlist Button -->
        <div class="absolute top-3 right-3 z-30">
            <livewire:wishlist-button :product-id="$product->id" :key="'wishlist-' . $product->id" />
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
    <div class="mt-1 px-1 sm:px-2 flex-grow">
        <div class="flex items-center gap-1 sm:gap-4 mb-0.5">
            <span
                class="px-1 py-0.5 sm:px-3 sm:py-1 bg-innovation/10 text-innovation text-[7px] sm:text-[10px] font-black uppercase rounded sm:rounded-lg">UMKM</span>
            <span
                class="text-[7px] sm:text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ now()->format('d/m/y') }}</span>
        </div>
        <h3
            class="text-[10px] sm:text-sm font-bold text-slate-900 tracking-tight leading-tight group-hover:text-primary transition-colors line-clamp-2 min-h-[2.4em]">
            {{ $product->name }}
        </h3>
    </div>

    <!-- Footer Area -->
    <div class="mt-auto px-1 sm:px-2 flex items-center justify-between py-1 border-t border-gray-50">
        <div class="flex flex-col">
            <span class="text-[12px] sm:text-lg font-black text-slate-900 tracking-tight">
                <span class="text-[7px] sm:text-xs font-bold">Rp</span>
                {{ number_format($product->price, 0, ',', '.') }}
            </span>
        </div>

        <!-- Animated Add Button -->
        <div class="relative z-30">
            <livewire:add-to-cart-button :product-id="$product->id" :key="'add-btn-' . $product->id" />
        </div>
    </div>
</div>