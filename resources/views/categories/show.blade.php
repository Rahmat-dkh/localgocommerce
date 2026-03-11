<x-app-layout>
    <div class="pt-4 lg:pt-6 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div
                class="mb-10 text-center lg:text-left flex flex-col lg:flex-row items-center lg:items-end justify-between gap-8">
                <div data-aos="fade-right">

                        {{ __('Kategori') }} <span class="text-primary">{{ $category->name }}</span>.
                    </h1>
                    <p class="text-neutral-dark/40 font-medium max-w-xl text-sm lg:text-base">
                        {{ $category->description }}
                    </p>
                </div>
            </div>

            <!-- Products Grid -->
            <div
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-x-3 gap-y-6 sm:gap-x-6 sm:gap-y-8">
                @forelse($category->products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full py-32 glass rounded-[3rem] border-dashed border-primary/20 text-center">
                        <div
                            class="w-20 h-20 bg-primary/5 rounded-3xl flex items-center justify-center mx-auto mb-6 text-primary/30">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <p class="text-neutral-dark/40 font-bold text-xl mb-4">{{ __('Belum ada produk di kategori ini.') }}</p>
                        <a href="{{ route('products.index') }}" class="btn-primary inline-flex items-center gap-2">{{ __('Jelajahi Produk Lain') }}</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>