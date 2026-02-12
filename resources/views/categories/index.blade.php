<x-app-layout>
    <div class="pt-10 lg:pt-14 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div data-aos="fade-right" class="mb-20 text-center lg:text-left">
                <div class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Departemen Utama</div>
                <h1 class="text-5xl lg:text-7xl font-black text-neutral-dark mb-4 tracking-tighter">
                    Belanja per <span class="text-innovation">Kategori</span>.
                </h1>
                <p class="text-neutral-dark/40 font-medium max-w-xl text-lg lg:text-xl">Mudahnya menemukan produk UMKM
                    berkualitas berdasarkan kebutuhan gaya hidupmu.</p>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($categories as $category)
                    <a data-aos="fade-up" href="{{ route('categories.show', $category->id) }}"
                        class="group relative aspect-[16/10] overflow-hidden rounded-[2.5rem] bg-neutral-dark/5 border border-white/20 shadow-sm hover:shadow-2xl hover:shadow-primary/10 transition-all duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-neutral-dark/80 via-transparent to-transparent z-10 opacity-60 group-hover:opacity-100 transition-opacity">
                        </div>

                        <!-- Placeholder Pattern -->
                        <div
                            class="absolute inset-0 flex items-center justify-center text-primary/10 transition-transform duration-700 group-hover:scale-110">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>

                        <div class="absolute bottom-10 left-10 z-20">
                            <h3
                                class="text-white text-3xl font-black mb-1 group-hover:-translate-y-1 transition-transform tracking-tight">
                                {{ $category->name }}
                            </h3>
                            <p class="text-white/60 font-bold text-xs uppercase tracking-widest">
                                {{ $category->products_count ?? $category->products()->count() }} Produk
                            </p>
                        </div>

                        <div
                            class="absolute top-10 right-10 z-20 opacity-0 group-hover:opacity-100 transition-all duration-500 scale-50 group-hover:scale-100">
                            <div
                                class="w-12 h-12 bg-white text-primary rounded-xl flex items-center justify-center shadow-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>