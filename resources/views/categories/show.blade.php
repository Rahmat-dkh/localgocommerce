<x-app-layout>
    <div class="pt-28 lg:pt-40 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div
                class="mb-20 text-center lg:text-left flex flex-col lg:flex-row items-center lg:items-end justify-between gap-8">
                <div data-aos="fade-right">
                    <div class="mb-6">
                        <a href="{{ route('categories.index') }}"
                            class="text-primary font-black uppercase tracking-widest text-xs flex items-center justify-center lg:justify-start gap-3 hover:gap-5 transition-all group">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Kategori
                        </a>
                    </div>
                    <h1 class="text-3xl lg:text-5xl font-black text-neutral-dark mb-4 tracking-tighter leading-none">
                        Kategori <span class="text-primary">{{ $category->name }}</span>.
                    </h1>
                    <p class="text-neutral-dark/40 font-medium max-w-xl text-lg lg:text-xl">{{ $category->description }}
                    </p>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-16">
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
                        <p class="text-neutral-dark/40 font-bold text-xl mb-4">Belum ada produk di kategori ini.</p>
                        <a href="{{ route('products.index') }}" class="btn-primary inline-flex items-center gap-2">Jelajahi
                            Produk Lain</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>