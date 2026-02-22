<x-app-layout>
    <div class="overflow-x-hidden">
        <!-- Hero Section -->
        <div class="relative pt-16 pb-12 lg:pt-14 lg:pb-16 overflow-hidden bg-white">
            <!-- Abstract Shapes -->
            <div
                class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 -z-10 w-[500px] h-[500px] bg-innovation/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
                <h1 class="text-2xl lg:text-5xl font-black text-neutral-dark mb-4 tracking-tighter leading-tight">
                    Hubungi <span class="text-primary">Kami.</span>
                </h1>
                <p class="max-w-2xl mx-auto text-sm text-slate-500 font-medium leading-relaxed">
                    Ada pertanyaan atau ingin bekerjasama? Kami siap membantu pertumbuhan bisnis kuliner Anda. Silakan
                    hubungi kami
                    melalui formulir di bawah ini.
                </p>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="py-12 lg:py-16 bg-slate-50">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
                    <!-- Info Column -->
                    <div data-aos="fade-right" class="space-y-6">
                        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-primary/5 border border-slate-100 h-full">
                            <h2
                                class="text-sm font-black text-neutral-dark mb-8 tracking-tight uppercase border-b border-slate-50 pb-4">
                                Informasi Kontak
                            </h2>

                            <div class="space-y-8">
                                <!-- Email Item -->
                                <div class="flex items-center gap-5 group">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-0.5">
                                            Email Resmi</p>
                                        <p class="text-sm font-bold text-slate-900 break-all">localgocommerce@gmail.com
                                        </p>
                                    </div>
                                </div>

                                <!-- Phone Item -->
                                <div class="flex items-center gap-5 group">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-innovation/10 flex items-center justify-center text-innovation group-hover:bg-innovation group-hover:text-white transition-all flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-0.5">
                                            WhatsApp Resmi</p>
                                        <p class="text-sm font-bold text-slate-900">+62 857 1296 6082</p>
                                    </div>
                                </div>

                                <!-- Address Item -->
                                <div class="flex items-center gap-5 group">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-growth/10 flex items-center justify-center text-growth group-hover:bg-growth group-hover:text-white transition-all flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-0.5">
                                            Lokasi Kami</p>
                                        <p class="text-sm font-bold text-slate-900">Purworejo, Jawa Tengah, Indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div data-aos="fade-left"
                        class="bg-white p-6 lg:p-8 rounded-3xl shadow-xl shadow-primary/5 border border-slate-100">
                        <h2 class="text-sm font-black text-neutral-dark mb-5 tracking-tight uppercase">Kirim Pesan</h2>

                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-2xl font-bold border border-green-100">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" placeholder="John Doe" required
                                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-50 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900 text-sm placeholder:text-slate-300">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Alamat
                                        Email</label>
                                    <input type="email" name="email" placeholder="john@example.com" required
                                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-50 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900 text-sm placeholder:text-slate-300">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Subjek
                                    Pesan</label>
                                <input type="text" name="subject" placeholder="Kerjasama Tenant Kuliner"
                                    class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-50 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900 text-sm placeholder:text-slate-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Pesan
                                    Anda</label>
                                <textarea name="message" rows="4" placeholder="Tuliskan pesan Anda di sini..." required
                                    class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-50 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900 text-sm placeholder:text-slate-300"></textarea>
                            </div>
                            <button type="submit"
                                class="btn-primary w-full py-3 text-sm shadow-2xl shadow-primary/20 bg-primary text-white font-black rounded-xl hover:bg-neutral-dark transition-all duration-500">
                                Kirim Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <style>
            /* Specific fix for Contact Page: Prevent horizontal shifting on mobile */
            @media (max-width: 1023px) {
                [data-aos] {
                    opacity: 1 !important;
                    transform: none !important;
                    visibility: visible !important;
                }
            }
        </style>
    @endpush
</x-app-layout>