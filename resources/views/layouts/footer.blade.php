<footer id="contact-us" class="bg-neutral-dark text-white pt-24 pb-12 overflow-hidden relative">
    <!-- Abstract Glow -->
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-primary/20 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-24 mb-20">
            <!-- Brand Column -->
            <div data-aos="fade-up" class="text-center md:text-left">
                <a href="/" class="inline-flex items-center gap-4 mb-8 group">
                    <img src="{{ asset('images/logo_localgo.png') }}" alt="LocalGo"
                        class="h-16 w-auto object-contain p-2 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10 group-hover:scale-105 transition-transform duration-300">
                    <span class="text-white font-black text-2xl tracking-tighter">
                        Local<span class="text-primary group-hover:text-white transition-colors duration-300">Go</span>
                    </span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed mb-8 max-w-sm mx-auto md:mx-0">
                    Memberdayakan UMKM Indonesia melalui teknologi e-commerce startup modern. Bersama LocalGo, produk
                    lokal beraksi di pasar global.
                </p>
                <div class="flex items-center justify-center md:justify-start gap-4">
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-primary transition-all group">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-growth transition-all group">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div data-aos="fade-up" data-aos-delay="100" class="text-center md:text-left">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Berbelanja</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('products.index') }}"
                            class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Semua
                            Produk</a></li>
                    <li><a href="{{ route('categories.index') }}"
                            class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Kategori
                            Pilihan</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Promo
                            Terbatas</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Produk
                            Terbaru</a></li>
                </ul>
            </div>

            <!-- About & Support -->
            <div data-aos="fade-up" data-aos-delay="200" class="text-center md:text-left">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Informasi</h4>
                <ul class="space-y-4">
                    <li><a href="#"
                            class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Tentang
                            LocalGo</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Cara
                            Berjualan</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Pusat
                            Bantuan</a></li>
                    <li><a href="#"
                            class="text-slate-400 hover:text-primary transition-colors font-bold text-sm">Kebijakan
                            Privasi</a></li>
                </ul>
            </div>

            <!-- Newsletter/Contact -->
            <div data-aos="fade-up" data-aos-delay="300" class="text-center md:text-left">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Hubungi Kami</h4>
                <div class="space-y-6">
                    <a href="mailto:localgocommerce@gmail.com"
                        class="flex flex-col md:flex-row items-center md:items-start gap-4 group/contact">
                        <div
                            class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center group-hover/contact:bg-primary transition-all">
                            <svg class="w-5 h-5 text-slate-400 group-hover/contact:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="text-center md:text-left">
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">Email Resmi
                            </p>
                            <p class="text-white font-bold text-sm">localgocommerce@gmail.com</p>
                        </div>
                    </a>

                    <a href="https://wa.me/6285712966082" target="_blank"
                        class="flex flex-col md:flex-row items-center md:items-start gap-4 group/contact mt-6">
                        <div
                            class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center group-hover/contact:bg-growth transition-all">
                            <svg class="w-5 h-5 text-slate-400 group-hover/contact:text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </div>
                        <div class="text-center md:text-left">
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">WhatsApp
                                Resmi
                            </p>
                            <p class="text-white font-bold text-sm">+62 857 1296 6082</p>
                        </div>
                    </a>

                    <form action="{{ route('products.index') }}" method="GET"
                        class="relative group mt-8 max-w-sm mx-auto md:mx-0">
                        <input type="text" name="search" placeholder="Cari Produk Lokal..." required
                            class="w-full bg-white/10 border border-white/20 rounded-xl px-5 py-4 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-white font-bold placeholder:text-slate-500 outline-none">
                        <button type="submit"
                            class="absolute right-2 top-2 p-2 bg-primary rounded-lg text-white shadow-lg shadow-primary/20 hover:scale-105 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
            <p class="text-slate-500 text-xs font-bold text-center md:text-left">
                &copy; {{ date('Y') }} LocalGo Commerce.
            </p>
            <div class="flex items-center justify-center md:justify-end gap-6 flex-wrap">
                <!-- Payment SVGs (Clean & Professional) -->
                <svg class="h-6 w-auto opacity-30 hover:opacity-100 transition-opacity grayscale hover:grayscale-0"
                    viewBox="0 0 49 16" fill="currentColor">
                    <path
                        d="M19.12 15.656h-2.903l1.815-11.238h2.903l-1.815 11.238zm17.917-10.93c-.636-.243-1.63-.5-2.827-.5-3.136 0-5.344 1.666-5.358 4.053-.02 1.764 1.579 2.748 2.784 3.336 1.235.603 1.653.99 1.648 1.528-.01.826-.988 1.205-1.902 1.205-1.272 0-1.947-.2-2.985-.658l-.42-.204-.447 2.775c.749.345 2.133.645 3.567.659 3.334 0 5.512-1.646 5.536-4.195.02-1.396-.83-2.457-2.656-3.328-1.106-.554-1.785-.926-1.785-1.492 0-.498.547-1.028 1.737-1.028a6.113 6.113 0 0 1 2.27.442l.27.124.418-2.712zm8.016 10.93h2.723l-2.408-11.238H42.71c-.63 0-1.173.365-1.408.924l-4.943 10.314h3.045l.608-1.68h3.717l.344 1.68zm-.954-4.364l1.583-4.364.912 4.364h-2.495zM9.544 4.418L6.726 12.08l-.304-1.554C5.897 8.526 4.156 6.326 1.488 4.96l-.048-.023v10.719h3.083V6.843l5.372 8.813h3.298l4.475-11.238h-3.124z" />
                </svg>
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                    <span class="text-[10px] font-bold text-slate-500">VISA</span>
                </div>
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                    <span class="text-[10px] font-bold text-slate-500">MC</span>
                </div>
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                    <span class="text-[10px] font-bold text-slate-500">QRIS</span>
                </div>
            </div>
        </div>
    </div>
</footer>