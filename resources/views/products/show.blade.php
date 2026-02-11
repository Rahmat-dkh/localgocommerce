<x-app-layout>
    <div class="pt-6 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="glass rounded-2xl sm:rounded-[2rem] overflow-hidden p-6 lg:p-10 border-white/40">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <!-- Gallery Section -->
                    <div data-aos="fade-right" class="space-y-6">
                        <!-- Main Image -->
                        <div
                            class="aspect-square bg-neutral-dark/5 rounded-[2.5rem] overflow-hidden relative flex items-center justify-center text-primary/10 shadow-inner group">
                            @if($product->image_url)
                                <img id="main-image" src="{{ $product->image_url }}"
                                    data-original-src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <svg class="w-48 h-48 transition-transform duration-700 group-hover:scale-110" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            @endif
                            <div class="absolute top-8 left-8">
                                <span
                                    class="bg-white/90 backdrop-blur-md px-6 py-2 rounded-2xl text-xs font-black uppercase tracking-widest text-primary shadow-lg">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        @if($product->images->count() > 0)
                            <div class="grid grid-cols-4 gap-4">
                                <!-- Main Image Thumbnail -->
                                <div onclick="changeImage(document.getElementById('main-image').getAttribute('data-original-src'))"
                                    class="aspect-square bg-white rounded-2xl border-2 border-transparent hover:border-primary overflow-hidden cursor-pointer transition-all shadow-sm">
                                    <img src="{{ $product->image_url }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Gallery Images -->
                                @foreach($product->images as $img)
                                    <div onclick="changeImage('{{ $img->image_url }}')"
                                        class="aspect-square bg-white rounded-2xl border-2 border-transparent hover:border-primary overflow-hidden cursor-pointer transition-all shadow-sm">
                                        <img src="{{ $img->image_url }}" class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <!-- Placeholder if no gallery images (Optional: hide or show empty boxes) -->
                        @endif
                    </div>

                    <script>
                        function changeImage(src) {
                            const mainImage = document.getElementById('main-image');
                            // Use a fade effect or just direct swap
                            mainImage.style.opacity = 0;
                            setTimeout(() => {
                                mainImage.src = src;
                                mainImage.style.opacity = 1;
                            }, 200);
                        }
                    </script>

                    <!-- Details Section -->
                    <div data-aos="fade-left" class="flex flex-col h-full">
                        <div class="mb-4">
                            <span class="text-xs font-black uppercase tracking-[0.3em] text-primary">Original UMKM
                                Product</span>
                        </div>
                        <h1
                            class="text-2xl lg:text-4xl font-black text-neutral-dark mb-6 tracking-tighter leading-tight">
                            {{ $product->name }}
                        </h1>

                        <div class="flex items-end gap-3 mb-8">
                            <span class="text-sm font-bold text-neutral-dark/40 mb-1">Rp</span>
                            <span
                                class="text-3xl font-black text-neutral-dark tracking-tighter">{{ number_format($product->price, 0, ',', '.') }}</span>
                            <span
                                class="text-growth font-bold text-sm bg-growth/10 px-3 py-1 rounded-lg mb-1 ml-2">Tersedia</span>
                        </div>

                        <div class="space-y-10 flex-grow">
                            <div>
                                <h3 class="text-xs font-black text-neutral-dark/30 uppercase tracking-[0.2em] mb-4">
                                    Informasi Produk</h3>
                                <p class="text-neutral-dark/60 leading-relaxed text-base font-medium">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <!-- Trust Badges -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                <div
                                    class="p-4 sm:p-5 bg-primary/5 rounded-2xl sm:rounded-3xl border border-primary/10 flex items-center gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 bg-primary text-white rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black uppercase text-primary tracking-widest leading-none mb-1">Pengiriman</span>
                                        <span class="text-xs font-bold text-neutral-dark">Cepat & Aman</span>
                                    </div>
                                </div>
                                <div
                                    class="p-4 sm:p-5 bg-growth/5 rounded-2xl sm:rounded-3xl border border-growth/10 flex items-center gap-3 sm:gap-4">
                                    <div
                                        class="w-10 h-10 bg-growth text-white rounded-xl flex items-center justify-center shadow-lg shadow-growth/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] font-black uppercase text-growth tracking-widest leading-none mb-1">Kualitas</span>
                                        <span class="text-xs font-bold text-neutral-dark">UMKM Teruji</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Startup Actions: WhatsApp Focus -->
                        <div class="mt-16 flex flex-col sm:flex-row gap-4">
                            <!-- WhatsApp Checkout Button -->
                            <a href="https://wa.me/{{ $product->whatsapp_number ?? '6281234567890' }}?text={{ urlencode('Halo, saya tertarik untuk membeli ' . $product->name . ' seharga Rp ' . number_format($product->price, 0, ',', '.')) }}"
                                target="_blank"
                                class="flex-grow h-14 sm:h-16 bg-growth hover:bg-growth-dark text-white rounded-[1.5rem] flex items-center justify-center gap-3 text-base sm:text-lg font-black transition-all shadow-2xl shadow-growth/30 hover:-translate-y-1">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                Beli Langsung via WA
                            </a>
                            <livewire:add-to-cart-button :product-id="$product->id" variant="text" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Products -->
            <div class="mt-32">
                <div class="flex items-end justify-between mb-16 px-4">
                    <h2 class="text-4xl font-black text-neutral-dark tracking-tight">Koleksi <span
                            class="text-primary italic">Lainnya</span></h2>
                    <a href="{{ route('products.index') }}" class="text-primary font-bold hover:underline">Lihat
                        Semua</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach(\App\Models\Product::with('category')->where('id', '!=', $product->id)->take(4)->get() as $p)
                        <x-product-card :product="$p" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>