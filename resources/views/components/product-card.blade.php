@props(['product'])

<div
    class="group relative flex flex-col h-full bg-white border border-slate-300 shadow-sm rounded-[1.5rem] p-1 md:p-1.5 hover:border-primary hover:shadow-xl hover:shadow-primary/10 transition-all duration-500 hover:-translate-y-1">
    <!-- Main Stretched Link -->
    <a href="{{ route('products.show', $product->id) }}" class="absolute inset-0 z-10"
        aria-label="{{ $product->name }}"></a>

    <!-- Image Area -->
    <div
        class="relative aspect-square rounded-[1.25rem] overflow-hidden bg-slate-50 transition-all duration-700 group-hover:bg-primary/5">
        <!-- Floating Tag -->
        <div class="absolute top-1 left-1 z-20">
            <span
                class="bg-white/95 backdrop-blur-md px-1.5 py-0.5 text-[10px] font-black uppercase tracking-wider text-primary rounded shadow-sm border border-slate-100">
                {{ $product->category->name }}
            </span>
        </div>

        <!-- Wishlist Button -->
        <div class="absolute top-1 right-1 z-30 scale-75 md:scale-100">
            <livewire:wishlist-button :product-id="$product->id" :key="'wishlist-' . $product->id" />
        </div>

        <!-- Product Image -->
        <div
            class="h-full w-full flex items-center justify-center transition-transform duration-700 group-hover:scale-110">
            @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            @else
                <div class="text-primary/10">
                    <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <!-- Content Area -->
    <div class="mt-1 px-0.5 flex flex-col flex-grow">
        <!-- Tags & Rating -->
        <div class="flex items-center justify-between mb-0.5">
            <span
                class="text-[11px] md:text-[11px] font-bold text-slate-400 font-medium truncate max-w-[50%]">
                {{ $product->vendor->shop_name ?? 'Sini Jajan Official' }}
            </span>
            @if($product->reviews_avg_rating > 0)
                <div class="flex items-center gap-0.5">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-[12px] md:text-sm font-bold text-slate-500">
                        {{ number_format($product->reviews_avg_rating, 1) }}
                        <span
                            class="text-slate-300 font-medium ml-0.5">({{ $product->reviews_count ?? $product->reviews()->count() }})</span>
                    </span>
                </div>
            @endif
        </div>

        <!-- Name -->
        <h3
            class="text-[15px] md:text-base font-black text-slate-800 tracking-tight leading-tight group-hover:text-primary transition-colors line-clamp-2 mb-0.5 flex-grow">
            {{ $product->name }}
        </h3>

        <!-- Price & Action -->
        <div class="mt-auto pt-0.5 flex items-center justify-between gap-1">
            <div class="flex flex-col min-w-0">
                <span class="text-[17px] md:text-[17px] font-semibold text-slate-800 tracking-tight truncate">
                    <span
                        class="text-[12px] md:text-sm font-semibold text-primary mr-0.5">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>

            <div class="relative z-30 transform scale-100 md:scale-95 origin-right shrink-0">
                <livewire:add-to-cart-button :product-id="$product->id" :key="'add-btn-' . $product->id" />
            </div>
        </div>
    </div>
</div>