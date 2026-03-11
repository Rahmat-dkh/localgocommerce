<x-app-layout>
    <div class="pt-16 lg:pt-14 pb-24 overflow-hidden relative">
        <!-- Abstract Shapes -->
        <div
            class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 -z-10 w-[500px] h-[500px] bg-innovation/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 lg:mb-20">
                <div data-aos="fade-down" class="text-primary font-black uppercase tracking-[0.2em] text-[10px] mb-4">
                    {{ __('Tentang Sini Jajan') }}
                </div>
                <h1 data-aos="fade-up"
                    class="text-3xl lg:text-5xl font-black text-neutral-dark tracking-tighter leading-none mb-6">
                    {{ __('Misi Kami: ') }}<span class="text-primary">{{ __('Melestarikan') }}</span>{{ __(' Rasa Nusantara.') }}
                </h1>
                <p data-aos="fade-up" data-aos-delay="100"
                    class="max-w-2xl mx-auto text-sm lg:text-base text-slate-500 font-medium leading-relaxed">
                    {{ __('Sini Jajan lahir dari kecintaan terhadap ragam kuliner autentik Indonesia. Kami percaya bahwa setiap suapan menceritakan kisah daerah asalnya, dan tugas kami adalah membawa kelezatan tersebut melalui teknologi yang memudahkan.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mb-20 lg:mb-24">
                <div data-aos="zoom-in" data-aos-delay="200"
                    class="bg-white border border-slate-100 p-8 lg:p-10 rounded-3xl text-center shadow-xl shadow-slate-200/50">
                    <div
                        class="w-14 h-14 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-black text-neutral-dark mb-3 uppercase tracking-tight">{{ __('Kurasi Cermat') }}</h3>
                    <p class="text-slate-500 text-xs lg:text-sm leading-relaxed">{{ __('Menyediakan platform yang memudahkan pencarian kuliner khas daerah yang telah dikurasi kualitas dan rasanya.') }}</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="300"
                    class="bg-white border border-slate-100 p-8 lg:p-10 rounded-3xl text-center shadow-xl shadow-slate-200/50">
                    <div
                        class="w-14 h-14 bg-innovation/10 text-innovation rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-base font-black text-neutral-dark mb-3 uppercase tracking-tight">{{ __('Jejaring Produsen') }}
                    </h3>
                    <p class="text-slate-500 text-xs lg:text-sm leading-relaxed">{{ __('Membangun ekosistem yang menghubungkan pengusaha kuliner lokal langsung dengan penikmat rasa di seluruh Indonesia.') }}</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="400"
                    class="bg-white border border-slate-100 p-8 lg:p-10 rounded-3xl text-center shadow-xl shadow-slate-200/50">
                    <div
                        class="w-14 h-14 bg-growth/10 text-growth rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-base font-black text-neutral-dark mb-3 uppercase tracking-tight">{{ __('Aksesibilitas Rasa') }}
                    </h3>
                    <p class="text-slate-500 text-xs lg:text-sm leading-relaxed">{{ __('Menghapus batasan jarak agar kelezatan kuliner nusantara dapat dinikmati di mana saja dan kapan saja.') }}</p>
                </div>
            </div>

            <!-- Team / Vision -->
            <div class="bg-primary rounded-[2rem] p-8 lg:p-14 relative overflow-hidden shadow-2xl shadow-primary/20">
                <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-[100px]"></div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
                    <div data-aos="fade-right">
                        <h2 class="text-2xl lg:text-4xl font-black text-white mb-4 tracking-tighter leading-tight">{{ __('Visi Kami 2030') }}</h2>
                        <p class="text-white/80 text-xs lg:text-sm font-medium mb-8 leading-relaxed">
                            {{ __('"Menjadi platform kuliner nomor satu di Indonesia yang memperkenalkan kekayaan rasa Nusantara ke seluruh pelosok negeri dan mancanegara melalui ekosistem digital yang andal."') }}
                        </p>
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-3 bg-white text-primary px-6 py-3.5 rounded-xl text-xs font-black shadow-xl hover:scale-105 transition-transform">
                             {{ __('Mulai Berbelanja') }}
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                    <div data-aos="fade-left" class="flex justify-center w-full">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800"
                            class="rounded-3xl shadow-2xl rotate-0 md:rotate-2 hover:rotate-0 transition-all duration-700 w-full max-w-sm lg:max-w-md border-4 border-white/10">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>