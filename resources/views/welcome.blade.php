<x-app-layout>
    <!-- Hero Section Removed -->

    <!-- Image Carousel -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-screen-2xl mx-auto pt-4 pb-2 px-4 sm:px-6 lg:px-8">
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





    <!-- Kuliner Nusantara Section -->
    <div class="py-12 bg-[#f0f9ff]/50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Product Showcase (First Priority) -->
            <div
                class="bg-white rounded-3xl p-6 md:p-8 shadow-xl border border-blue-100 relative overflow-hidden mb-12">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                </div>

                <div class="flex items-center justify-between mb-8 relative z-10">
                    <h3 class="text-xl md:text-2xl font-black text-neutral-dark">Produk <span
                            class="text-blue-500">Unggulan</span></h3>
                    <a href="{{ route('products.index') }}"
                        class="px-4 py-2 bg-blue-50 text-blue-600 font-bold rounded-xl text-xs hover:bg-blue-100 transition-colors">Lihat
                        Semua</a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6 relative z-10">
                    @foreach(\App\Models\Product::take(5)->get() as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Section (Rekomendasi) -->
    <div class="py-12 bg-slate-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
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

    <!-- Kuliner Nusantara Text & Features (Moved Below) -->
    <div class="pb-16 pt-6 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full">
                <div class="absolute top-1/4 right-0 w-96 h-96 bg-blue-100/40 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-80 h-80 bg-orange-100/30 rounded-full blur-3xl"></div>
            </div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header (Title & Text) -->
            <div class="text-center max-w-3xl mx-auto mb-16">

                <h2 class="text-3xl md:text-5xl font-black text-neutral-dark mb-6 tracking-tight leading-tight">
                    Jelajahi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Rasa
                        Nusantara</span></h2>
                <p class="text-slate-500 text-lg leading-relaxed">
                    Oleh-oleh otentik dari seluruh penjuru Indonesia. Dikurasi khusus
                    makanan yang <span class="font-bold text-neutral-dark">awet & tahan lama</span>, siap dikirim
                    dengan
                    aman ke depan pintu rumahmu.
                </p>
            </div>

            <!-- Features / Trust Badges -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3
                            class="text-xl font-bold text-neutral-dark mb-2 group-hover:text-blue-600 transition-colors">
                            Awet & Tahan Lama</h3>
                        <p class="text-slate-500 leading-relaxed">Dipilih khusus untuk pengiriman jarak jauh tanpa
                            mengurangi kualitas rasa saat sampai.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div
                    class="group bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3
                            class="text-xl font-bold text-neutral-dark mb-2 group-hover:text-blue-600 transition-colors">
                            Kualitas Terjamin</h3>
                        <p class="text-slate-500 leading-relaxed">Rasa otentik langsung dari daerah asalnya,
                            melewati proses kurasi yang ketat.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div
                    class="group bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3
                            class="text-xl font-bold text-neutral-dark mb-2 group-hover:text-blue-600 transition-colors">
                            Asli UMKM Daerah</h3>
                        <p class="text-slate-500 leading-relaxed">Dukung ekonomi lokal di setiap gigitan, langsung
                            memberdayakan pengusaha kecil.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp CTA (Compact) -->
    <div class="py-10 bg-white relative overflow-hidden">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
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
                            <span class="text-white font-bold text-sm">2,400+ Orang telah bertransaksi hari
                                ini</span>
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