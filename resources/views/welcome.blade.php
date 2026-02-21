<x-app-layout>
    <!-- Hero Section Removed -->

    <!-- Modern 3-Panel Carousel -->
    <div class="bg-white pt-2 pb-2 md:pt-6 md:pb-6 overflow-hidden">
        <div x-data="{ 
            active: 1, 
            count: 3,
            slides: [
                {
                    img: '{{ asset('images/getuklindri.jpg') }}',
                    title: 'Getuk Lindri Khas',
                    subtitle: 'Warna warni keceriaan jajanan pasar tradisional.',
                    tag: 'Terbaru',
                    color: 'from-pink-600 to-purple-600'
                },
                {
                    img: '{{ asset('images/bakpia-patuk.jpg') }}',
                    title: 'Bakpia Patok Jogja',
                    subtitle: 'Kelembutan legendaris yang selalu dirindukan.',
                    tag: 'Favorit',
                    color: 'from-blue-600 to-cyan-500'
                },
                {
                    img: '{{ asset('images/Dodol.jpg') }}',
                    title: 'Dodol Autentik',
                    subtitle: 'Manis legit warisan kuliner Ibu pertiwi.',
                    tag: 'Khas Daerah',
                    color: 'from-orange-600 to-yellow-500'
                }
            ],
            next() { this.active = (this.active + 1) % this.count },
            prev() { this.active = (this.active - 1 + this.count) % this.count },
            init() { 
                setInterval(() => this.next(), 5000)
            }
        }" class="relative w-full">

            <!-- Slides Container -->
            <div class="relative flex items-center justify-center h-[180px] md:h-[280px]">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class="absolute transition-all duration-700 ease-in-out cursor-pointer" :class="{
                            'z-30 w-[80%] md:w-[60%] opacity-100 scale-100': active === index,
                            'z-20 w-[80%] md:w-[60%] opacity-40 scale-90 -translate-x-[65%] md:-translate-x-[55%]': (active - 1 + count) % count === index,
                            'z-20 w-[80%] md:w-[60%] opacity-40 scale-90 translate-x-[65%] md:translate-x-[55%]': (active + 1) % count === index,
                            'z-10 opacity-0': active !== index && (active - 1 + count) % count !== index && (active + 1) % count !== index
                        }" @click="active = index">
                        <div
                            class="relative h-[180px] md:h-[280px] rounded-[1.5rem] md:rounded-[2.5rem] overflow-hidden shadow-xl">
                            <img :src="slide.img" class="w-full h-full object-cover" :alt="slide.title">

                            <!-- Content Overlay -->
                            <div x-show="active === index"
                                x-transition:enter="transition ease-out delay-300 duration-500"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/20 to-transparent flex items-center px-6 md:px-12">
                                <div class="max-w-xl text-white">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full text-[8px] md:text-[10px] font-black uppercase tracking-widest bg-white/20 backdrop-blur-md mb-2 md:mb-4"
                                        x-text="slide.tag"></span>
                                    <h2 class="text-xl md:text-4xl font-black tracking-tighter leading-none mb-2 md:mb-4"
                                        x-text="slide.title"></h2>
                                    <p class="text-[10px] md:text-base text-white/70 font-medium mb-4 md:mb-8 max-w-md leading-tight md:leading-relaxed"
                                        x-text="slide.subtitle"></p>
                                    <a href="{{ route('products.index') }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 md:px-6 md:py-2.5 bg-white text-primary font-black rounded-xl hover:bg-neutral-dark hover:text-white transition-all shadow-lg text-[10px] md:text-sm">
                                        Mulai Belanja
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Enhanced Navigation Controls -->
            <div
                class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between px-2 md:px-32 z-40 pointer-events-none">
                <button @click="prev()"
                    class="pointer-events-auto w-10 h-10 md:w-14 md:h-14 flex items-center justify-center rounded-full bg-white/90 shadow-2xl text-primary hover:bg-primary hover:text-white transition-all transform active:scale-90">
                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()"
                    class="pointer-events-auto w-10 h-10 md:w-14 md:h-14 flex items-center justify-center rounded-full bg-white/90 shadow-2xl text-primary hover:bg-primary hover:text-white transition-all transform active:scale-90">
                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Dot Indicators -->
            <div class="flex justify-center gap-3 mt-8">
                <template x-for="n in count" :key="n-1">
                    <button @click="active = n-1" class="h-1 rounded-full transition-all duration-500"
                        :class="active === n-1 ? 'bg-primary w-8' : 'bg-slate-200 w-1.5'"></button>
                </template>
            </div>
        </div>
    </div>


    <!-- Kuliner Nusantara Section -->
    <div class="py-2 md:py-6 bg-slate-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Product Showcase (First Priority) -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl border border-blue-100 relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                </div>

                <div class="flex items-center justify-between mb-8 relative z-10 gap-4">
                    <h3 class="text-lg md:text-2xl font-black text-neutral-dark whitespace-nowrap">
                        Produk <span class="text-blue-500">Unggulan</span>
                    </h3>
                    <a href="{{ route('products.index') }}"
                        class="px-4 py-2 bg-blue-50 text-blue-600 font-bold rounded-xl text-xs hover:bg-blue-100 transition-colors whitespace-nowrap">
                        Lihat Semua
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-8 relative z-10">
                    @foreach(\App\Models\Product::withAvg('reviews', 'rating')->take(5)->get() as $product)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Section (Rekomendasi) -->
    <div class="py-2 md:py-6 bg-slate-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-xl md:text-3xl font-black text-slate-900 tracking-tighter leading-none">Pilihan
                        <span class="text-primary italic">Terlaris</span>
                    </h2>
                    <span
                        class="bg-innovation/10 text-innovation text-[8px] md:text-[10px] font-black uppercase px-2.5 py-1 rounded-lg">Paling
                        Dicari</span>
                </div>
                <a href="{{ route('products.index') }}" class="text-xs font-bold text-primary hover:underline">Lihat
                    Semua</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach(\App\Models\Product::with('category')->withAvg('reviews', 'rating')->take(15)->get() as $product)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 5) * 100 }}">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Jelajahi Rasa Nusantara Section -->
    <div class="pb-10 pt-6 md:pb-16 md:pt-12 relative overflow-hidden bg-white">
        <!-- Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-500/5 rounded-full blur-[120px]"></div>
        </div>

        <!-- Header (Title & Text) -->
        <!-- Header (Title & Text) -->
        <div class="text-center max-w-7xl mx-auto mb-6 md:mb-12" data-aos="fade-up">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-xl md:text-5xl font-black text-slate-900 mb-3 md:mb-6 tracking-tighter leading-tight">
                    Jelajahi <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-blue-400 to-indigo-500">Rasa
                        Nusantara</span>
                </h2>
                <p class="text-slate-500 text-xs md:text-lg leading-relaxed font-medium mb-6 md:mb-10 px-4">
                    Oleh-oleh otentik dari seluruh penjuru Indonesia. Dikurasi khusus
                    makanan yang <span class="text-slate-900 font-black border-b-2 border-primary/20">awet & tahan
                        lama</span>,
                    siap dikirim dengan aman ke depan pintu rumahmu.
                </p>
            </div>

            <!-- Integrated Features Strip -->
            <div
                class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 pt-6 md:pt-10 border-t border-slate-100 px-4 sm:px-6 lg:px-12">
                <!-- Feature 1 -->
                <div class="group relative aspect-auto md:aspect-square flex flex-col justify-center p-4 md:p-6 bg-white border-2 border-slate-300 rounded-[1.5rem] md:rounded-[2rem] hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-[1.5rem] md:rounded-[2.5rem]">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div
                            class="w-14 h-14 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-gradient-to-br from-slate-50 to-white border border-slate-100 flex items-center justify-center text-primary mb-3 md:mb-4 shadow-xl shadow-slate-200/50 group-hover:scale-110 group-hover:shadow-blue-500/20 group-hover:from-primary group-hover:to-blue-600 group-hover:text-white group-hover:border-transparent transition-all duration-500">
                            <svg class="w-7 h-7 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mb-1 group-hover:text-primary transition-colors">
                            Awet & Tahan Lama</h3>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">Khusus pengiriman
                            jarak jauh</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative aspect-auto md:aspect-square flex flex-col justify-center p-4 md:p-6 bg-white border-2 border-slate-300 rounded-[1.5rem] md:rounded-[2rem] hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-[1.5rem] md:rounded-[2.5rem]">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div
                            class="w-14 h-14 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-gradient-to-br from-slate-50 to-white border border-slate-100 flex items-center justify-center text-primary mb-3 md:mb-4 shadow-xl shadow-slate-200/50 group-hover:scale-110 group-hover:shadow-blue-500/20 group-hover:from-primary group-hover:to-blue-600 group-hover:text-white group-hover:border-transparent transition-all duration-500">
                            <svg class="w-7 h-7 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mb-1 group-hover:text-primary transition-colors">
                            Kualitas Terjamin</h3>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">Rasa otentik daerah
                            asal</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative aspect-auto md:aspect-square flex flex-col justify-center p-4 md:p-6 bg-white border-2 border-slate-300 rounded-[1.5rem] md:rounded-[2rem] hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-[1.5rem] md:rounded-[2.5rem]">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div
                            class="w-14 h-14 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-gradient-to-br from-slate-50 to-white border border-slate-100 flex items-center justify-center text-primary mb-3 md:mb-4 shadow-xl shadow-slate-200/50 group-hover:scale-110 group-hover:shadow-blue-500/20 group-hover:from-primary group-hover:to-blue-600 group-hover:text-white group-hover:border-transparent transition-all duration-500">
                            <svg class="w-7 h-7 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-primary transition-colors">
                            Asli UMKM Daerah</h3>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">Berdayakan pengusaha lokal</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="group relative aspect-auto md:aspect-square flex flex-col justify-center p-4 md:p-6 bg-white border-2 border-slate-300 rounded-[1.5rem] md:rounded-[2rem] hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-900/5 transition-all duration-500 hover:-translate-y-2"
                    data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-[1.5rem] md:rounded-[2.5rem]">
                    </div>

                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div
                            class="w-14 h-14 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-gradient-to-br from-slate-50 to-white border border-slate-100 flex items-center justify-center text-primary mb-3 md:mb-4 shadow-xl shadow-slate-200/50 group-hover:scale-110 group-hover:shadow-blue-500/20 group-hover:from-primary group-hover:to-blue-600 group-hover:text-white group-hover:border-transparent transition-all duration-500">
                            <svg class="w-7 h-7 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mb-1 group-hover:text-primary transition-colors">
                            Pengiriman Seluruh Indonesia</h3>
                        <p class="text-xs text-slate-500 font-medium leading-relaxed">Jangkauan luas ke
                            seluruh negeri</p>
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
                        <h2 class="text-3xl lg:text-5xl font-black text-white mb-6 tracking-tighter leading-none">
                            Hubungkan Langsung <br>Ke UMKM Favoritmu.
                        </h2>
                        <p class="text-white/60 text-base lg:text-lg font-medium mb-8 max-w-lg">
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
                            class="glass p-8 rounded-[40px] max-w-sm transform rotate-0 md:-rotate-2 hover:rotate-0 transition-all duration-500 shadow-2xl shadow-black/20">
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