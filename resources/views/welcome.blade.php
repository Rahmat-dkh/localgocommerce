<x-app-layout>
    <!-- Hero Section: Premium Startup Look -->
    <div class="relative pt-12 pb-12 lg:pt-32 lg:pb-40 overflow-hidden bg-white">
        <!-- Abstract Shapes -->
        <div
            class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 -z-10 w-[500px] h-[500px] bg-innovation/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">


            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-[7rem] font-black text-neutral-dark mb-4 sm:mb-10 tracking-tightest leading-[0.9] lg:max-w-5xl mx-auto">
                Lokal Kini <br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-primary-dark to-innovation">Beraksi
                    Global.</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="200"
                class="max-w-3xl mx-auto text-base lg:text-xl text-neutral-dark/60 mb-8 sm:mb-14 font-medium leading-relaxed px-4 sm:px-0">
                Platform UMKM modern yang memberdayakan kreativitas lokal dengan teknologi e-commerce startup yang siap
                mendunia. Temukan produk pilihan dari pengrajin terbaik Indonesia.
            </p>

            <div data-aos="fade-up" data-aos-delay="300"
                class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 w-full max-w-sm sm:max-w-none mx-auto">
                <a href="{{ route('products.index') }}"
                    class="btn-primary w-full sm:w-auto text-sm sm:text-lg px-8 sm:px-12 py-3.5 sm:py-5 shadow-2xl shadow-primary/30 flex items-center justify-center gap-3">
                    Beli Produk Lokal
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="{{ route('categories.index') }}"
                    class="btn-primary w-full sm:w-auto text-sm sm:text-lg px-8 sm:px-12 py-3.5 sm:py-5 shadow-2xl shadow-primary/30 flex items-center justify-center !bg-white !text-neutral-dark border-2 border-primary/10 hover:!border-primary/30 hover:!bg-neutral-light">
                    Jelajahi UMKM
                </a>
            </div>

            <!-- Stats/Social Proof -->
            <div data-aos="fade-up" data-aos-delay="400"
                class="mt-24 grid grid-cols-2 md:grid-cols-4 gap-12 lg:max-w-5xl mx-auto items-center grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-700">
                <div class="flex flex-col items-center border-r border-slate-100 last:border-r-0">
                    <span class="text-4xl font-black text-neutral-dark mb-1">5+</span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">UMKM Terdaftar</span>
                </div>
                <div class="flex flex-col items-center border-r border-slate-100 last:border-r-0">
                    <span class="text-4xl font-black text-neutral-dark mb-1">20+</span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Produk Terpilih</span>
                </div>
                <div class="flex flex-col items-center border-r border-slate-100 last:border-r-0">
                    <span class="text-4xl font-black text-neutral-dark mb-1">100%</span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Transaksi Aman</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-4xl font-black text-neutral-dark mb-1">5.0/5</span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Rating Pembeli</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Section -->
    <div class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-20 gap-8">
                <div data-aos="fade-right">
                    <div class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Pilihan UMKM</div>
                    <h2 class="text-4xl lg:text-6xl font-black text-neutral-dark tracking-tighter leading-tight">
                        Produk <span class="bg-primary/10 text-primary px-4 rounded-2xl">Terbaik</span> <br>Minggu Ini.
                    </h2>
                </div>
                <a data-aos="fade-left" href="{{ route('products.index') }}"
                    class="inline-flex items-center gap-3 text-primary font-black group">
                    <span class="text-sm uppercase tracking-widest">Semua Koleksi</span>
                    <div
                        class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center transition-all group-hover:translate-x-2 shadow-lg shadow-primary/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-8">
                @foreach(\App\Models\Product::with('category')->take(8)->get() as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>

    <!-- Category Section -->
    <div class="py-32 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl lg:text-6xl font-black text-neutral-dark tracking-tighter leading-tight mb-6">
                    Telusuri Berdasarkan <span class="text-primary">Kategori.</span>
                </h2>
                <p class="text-slate-500 font-medium text-lg max-w-2xl mx-auto">
                    Temukan apa yang Anda butuhkan melalui pengelompokan produk yang memudahkan navigasi.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @foreach(\App\Models\Category::take(6)->get() as $category)
                    <a href="{{ route('categories.show', $category->id) }}" data-aos="zoom-in"
                        class="group relative aspect-square rounded-[2rem] bg-slate-50 flex flex-col items-center justify-center p-6 transition-all duration-300 hover:bg-white border-2 border-transparent hover:border-primary hover:scale-105 hover:shadow-2xl hover:shadow-primary/20">
                        <div
                            class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:bg-primary/10 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-slate-400 group-hover:text-primary transition-colors duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </div>
                        <span
                            class="text-sm font-black text-slate-500 group-hover:text-primary uppercase tracking-widest text-center transition-colors duration-300">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- WhatsApp CTA -->
    <div class="py-32 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-gradient-to-br from-primary via-primary-dark to-neutral-dark rounded-[48px] p-12 lg:p-24 relative overflow-hidden shadow-2xl shadow-primary/30">
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