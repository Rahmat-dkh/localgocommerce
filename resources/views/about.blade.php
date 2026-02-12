<x-app-layout>
    <div class="pt-10 lg:pt-14 pb-24 overflow-hidden relative">
        <!-- Abstract Shapes -->
        <div
            class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 -z-10 w-[500px] h-[500px] bg-innovation/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-24">
                <div data-aos="fade-down" class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">About
                    LocalGo</div>
                <h1 data-aos="fade-up"
                    class="text-3xl lg:text-5xl font-black text-neutral-dark tracking-tighter leading-none mb-8">
                    Misi Kami: <span class="text-primary italic">Globalisasi</span> UMKM.
                </h1>
                <p data-aos="fade-up" data-aos-delay="100"
                    class="max-w-3xl mx-auto text-base text-slate-500 font-medium leading-relaxed">
                    LocalGo Commerce lahir dari semangat untuk memberdayakan potensi lokal Indonesia. Kami percaya bahwa
                    produk kreatif UMKM layak mendapatkan panggung internasional melalui teknologi startup yang
                    inklusif.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-32">
                <div data-aos="zoom-in" data-aos-delay="200" class="glass p-10 rounded-[40px] text-center">
                    <div
                        class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral-dark mb-4">Inovasi Digital</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Menyediakan platform e-commerce tercanggih yang
                        mudah digunakan oleh seluruh pelaku UMKM.</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="300" class="glass p-10 rounded-[40px] text-center">
                    <div
                        class="w-16 h-16 bg-innovation/10 text-innovation rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral-dark mb-4">Ekosistem Sinergi</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Membangun komunitas yang menghubungkan produsen
                        lokal langsung dengan konsumen global.</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="400" class="glass p-10 rounded-[40px] text-center">
                    <div
                        class="w-16 h-16 bg-growth/10 text-growth rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral-dark mb-4">Aksesibilitas Global</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Menghapus batasan geografis agar produk lokal
                        Indonesia dapat dinikmati di mana saja.</p>
                </div>
            </div>

            <!-- Team / Vision -->
            <div class="bg-primary rounded-[60px] p-12 lg:p-24 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-[100px]"></div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div data-aos="fade-right">
                        <h2 class="text-3xl lg:text-4xl font-black text-white mb-6 tracking-tighter leading-none">Visi
                            Kami 2030</h2>
                        <p class="text-white/70 text-base lg:text-lg font-medium mb-12">
                            Menjadi akselerator UMKM nomor satu di Indonesia yang membawa setidaknya 100.000 brand lokal
                            ke kancah internasional melalui ekosistem digital yang berkelanjutan.
                        </p>
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-4 bg-white text-primary px-10 py-5 rounded-3xl font-black shadow-2xl hover:scale-105 transition-transform">
                            Mulai Berbelanja
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                    <div data-aos="fade-left" class="flex justify-center">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1000"
                            class="rounded-[40px] shadow-2xl rotate-3 hover:rotate-0 transition-all duration-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>