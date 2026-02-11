<x-app-layout>
    <!-- Hero Section Removed -->

    <!-- Image Carousel -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto pt-4 pb-2 px-4 sm:px-6 lg:px-8">
            <div x-data="{ 
                active: 0, 
                count: 3,
                images: [
                    'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&q=80&w=1600',
                    'https://images.unsplash.com/photo-1580674285054-bed31e145f59?auto=format&fit=crop&q=80&w=1600',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1600'
                ],
                next() { this.active = (this.active + 1) % this.count },
                prev() { this.active = (this.active - 1 + this.count) % this.count },
                init() { setInterval(() => this.next(), 5000) }
            }" class="relative overflow-hidden rounded-2xl shadow-lg aspect-[21/9] md:aspect-[3.2/1]">
                <!-- Slides -->
                <template x-for="(img, index) in images" :key="index">
                    <div x-show="active === index" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 transform scale-110"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img :src="img" class="w-full h-full object-cover" alt="Banner">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                </template>

                <!-- Navigation Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
                    <template x-for="n in count" :key="n-1">
                        <button @click="active = n-1" :class="active === n-1 ? 'bg-white w-8' : 'bg-white/50 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                    </template>
                </div>

                <!-- Prev/Next Buttons (Desktop) -->
                <button @click="prev()"
                    class="hidden md:flex absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 items-center justify-center rounded-full bg-black/20 text-white hover:bg-black/40 transition-colors z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()"
                    class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 items-center justify-center rounded-full bg-black/20 text-white hover:bg-black/40 transition-colors z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Featured Section (Rekomendasi) -->
    <div class="pt-0 pb-8 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-bold text-neutral-dark">Rekomendasi</h2>
                    <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-1 rounded-md">Pilihan
                        Terbaik</span>
                </div>
                <a href="{{ route('products.index') }}" class="text-xs font-bold text-primary hover:underline">Lihat
                    Semua</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach(\App\Models\Product::with('category')->take(16)->get() as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>

    <!-- Category Section (Shopee Style: Top & Compact) -->
    <div class="py-8 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-lg font-bold text-neutral-dark">Kategori Pilihan</h2>
                <a href="{{ route('categories.index') }}" class="text-xs font-bold text-primary hover:underline">Lihat
                    Semua</a>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-6 Gap-4">
                @foreach(\App\Models\Category::take(6)->get() as $category)
                    <a href="{{ route('categories.show', $category->id) }}"
                        class="group flex flex-col items-center gap-3 p-4 rounded-xl hover:bg-slate-50 transition-all">
                        <div
                            class="w-12 h-12 md:w-16 md:h-16 bg-white border border-gray-100 rounded-full flex items-center justify-center shadow-sm group-hover:border-primary group-hover:shadow-md transition-all">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-slate-400 group-hover:text-primary transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-medium text-center text-slate-600 group-hover:text-primary line-clamp-2">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- WhatsApp CTA (Compact) -->
    <div class="py-10 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-gradient-to-r from-primary to-primary-dark rounded-2xl p-8 relative overflow-hidden shadow-lg">
                <!-- Glowing effect -->
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-innovation/30 rounded-full blur-[100px]"></div>

                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center text-center lg:text-left">
                    <div data-aos="fade-up">
                        <h2 class="text-4xl lg:text-6xl font-black text-white mb-8 tracking-tighter leading-none">
                            Hubungkan Langsung <br>Ke UMKM Favoritmu.
                        </h2>
                        <p class="text-white/60 text-lg lg:text-xl font-medium mb-10 max-w-lg">
                            Dukungan penuh fitur checkout via WhatsApp untuk transaksi yang lebih personal dan aman
                            langsung ke penjual.
                        </p>
                        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                            <div class="flex -space-x-3">
                                @for($i = 1; $i <= 4; $i++)
                                    <img class="w-12 h-12 rounded-full border-4 border-primary-dark shadow-xl"
                                        src="https://ui-avatars.com/api/?name=User+{{$i}}&background=random" alt="User">
                                @endfor
                            </div>
                            <span class="text-white font-bold text-sm">2,400+ Orang telah bertransaksi hari ini</span>
                        </div>
                    </div>
                    <div data-aos="zoom-in" class="flex justify-center">
                        <div
                            class="glass p-8 rounded-[40px] max-w-sm transform -rotate-2 hover:rotate-0 transition-all duration-500 shadow-2xl shadow-black/20">
                            <div
                                class="w-16 h-16 bg-growth rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-growth/30">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </div>
                            <div class="space-y-4">
                                <div class="w-full h-3 bg-neutral-dark/10 rounded-full"></div>
                                <div class="w-5/6 h-3 bg-neutral-dark/10 rounded-full"></div>
                                <div class="w-4/6 h-3 bg-neutral-dark/10 rounded-full"></div>
                                <div class="pt-4">
                                    <div
                                        class="w-full h-12 bg-primary rounded-2xl flex items-center justify-center text-white font-black">
                                        Pesan Otomatis</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>