@php
    $title = $product->name . ' - ' . ($product->category->name ?? 'Produk');
    $description = Str::limit(strip_tags($product->description), 160);
    $keywords = $product->name . ', ' . ($product->category->name ?? '') . ', makanan lokal, UMKM, LocalGo';
@endphp

<x-app-layout :title="$title">
    @section('meta_description', $description)
    @section('meta_keywords', $keywords)

    @push('scripts')
        <script type="application/ld+json">
                        {
                            "@context": "https://schema.org/",
                            "@type": "Product",
                            "name": "{{ $product->name }}",
                            "image": [
                                "{{ $product->image_url }}"
                            ],
                            "description": "{{ $description }}",
                            "sku": "{{ $product->id }}",
                            "brand": {
                                "@type": "Brand",
                                "name": "LocalGo UMKM"
                            },
                            "offers": {
                                "@type": "Offer",
                                "url": "{{ url()->current() }}",
                                "priceCurrency": "IDR",
                                "price": "{{ $product->price }}",
                                "availability": "https://schema.org/InStock",
                                "itemCondition": "https://schema.org/NewCondition"
                            }
                            @if($product->averageRating() > 0)
                                ,"aggregateRating": {
                                    "@type": "AggregateRating",
                                    "ratingValue": "{{ $product->averageRating() }}",
                                    "reviewCount": "{{ $product->reviews_count ?? $product->reviews->count() }}"
                                }
                            @endif
                        }
                        </script>
    @endpush
    <div class="pt-1 pb-4 sm:pt-4 sm:pb-8 px-2 sm:px-6 lg:px-8">
        <div class="max-w-screen-2xl mx-auto">
            <div class="glass rounded-xl sm:rounded-[2rem] overflow-hidden p-3 lg:p-7 border-white/40">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                    <!-- Gallery Section -->
                    <div data-aos="fade-right" class="lg:col-span-4 space-y-4">
                        <!-- Main Image -->
                        <div
                            class="aspect-square bg-neutral-dark/5 rounded-[2.5rem] overflow-hidden relative flex items-center justify-center text-primary/10 shadow-inner group max-w-lg mx-auto lg:mx-0">
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
                            <div class="absolute top-6 left-6">
                                <span
                                    class="bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-primary shadow-lg">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        @php
                            $extraImages = $product->images->where('image_path', '!=', $product->image);
                        @endphp

                        @if($extraImages->count() > 0)
                            <div class="grid grid-cols-4 gap-4">
                                <!-- Main Image Thumbnail -->
                                <div onclick="changeImage(document.getElementById('main-image').getAttribute('data-original-src'))"
                                    class="aspect-square bg-white rounded-2xl border-2 border-transparent hover:border-primary overflow-hidden cursor-pointer transition-all shadow-sm">
                                    <img src="{{ $product->image_url }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Gallery Images -->
                                @foreach($extraImages as $img)
                                    <div onclick="changeImage('{{ $img->image_url }}')"
                                        class="aspect-square bg-white rounded-2xl border-2 border-transparent hover:border-primary overflow-hidden cursor-pointer transition-all shadow-sm">
                                        <img src="{{ $img->image_url }}" class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            </div>
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
                    <div data-aos="fade-left" class="lg:col-span-8 flex flex-col h-full">
                        <div class="mb-2">
                            <span class="text-xs font-black uppercase tracking-[0.3em] text-primary">Original UMKM
                                Product</span>
                        </div>
                        <h1
                            class="text-xl lg:text-4xl font-black text-neutral-dark mb-3 tracking-tighter leading-tight">
                            {{ $product->name }}
                        </h1>

                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-end gap-2.5">
                                <span class="text-xs font-bold text-neutral-dark/40 mb-1">Rp</span>
                                <span
                                    class="text-xl lg:text-2xl font-black text-neutral-dark tracking-tighter">{{ number_format($product->price, 0, ',', '.') }}</span>
                                <span
                                    class="text-growth font-bold text-[10px] bg-growth/10 px-2.5 py-0.5 rounded-lg mb-1 ml-1.5">Tersedia</span>
                            </div>
                            <div class="h-8 w-px bg-neutral-dark/5"></div>
                            <div class="flex items-center gap-2">
                                @if($product->averageRating() > 0)
                                    <div class="flex text-amber-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= round($product->averageRating()) ? 'fill-current' : 'text-neutral-dark/10' }}"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <span
                                        class="text-xs font-black text-neutral-dark/40 tracking-widest">{{ number_format($product->averageRating(), 1) }}</span>
                                @else
                                    <span class="text-xs font-bold text-neutral-dark/40">Belum ada ulasan</span>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-4 flex-grow">
                            <div>
                                <h3 class="text-[10px] font-black text-neutral-dark/30 uppercase tracking-[0.2em] mb-3">
                                    Informasi Produk</h3>
                                <p class="text-neutral-dark/60 leading-relaxed text-sm font-medium">
                                    {{ $product->description }}
                                </p>
                            </div>



                            <!-- Share Section -->
                            <div class="pt-5 border-t border-neutral-dark/5">
                                <h3 class="text-[10px] font-black text-neutral-dark/30 uppercase tracking-[0.2em] mb-3">
                                    Bagikan Produk</h3>
                                <div class="flex flex-wrap gap-2.5">
                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/?text={{ urlencode('Cek produk keren ini: ' . $product->name . ' - ' . url()->current()) }}"
                                        target="_blank"
                                        class="w-9 h-9 rounded-xl bg-[#25D366]/10 text-[#25D366] flex items-center justify-center hover:bg-[#25D366] hover:text-white transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                        </svg>
                                    </a>
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank"
                                        class="w-9 h-9 rounded-xl bg-[#1877F2]/10 text-[#1877F2] flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </a>
                                    <!-- Twitter / X -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode('Cek produk keren ini: ' . $product->name) }}"
                                        target="_blank"
                                        class="w-9 h-9 rounded-xl bg-black/5 text-black flex items-center justify-center hover:bg-black hover:text-white transition-all shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                        </svg>
                                    </a>
                                    <!-- Copy Link -->
                                    <button onclick="copyToClipboard()"
                                        class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-sm">
                                        <svg id="copy-icon" class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <script>
                                function copyToClipboard() {
                                    navigator.clipboard.writeText(window.location.href).then(() => {
                                        const icon = document.getElementById('copy-icon');
                                        const originalPath = icon.innerHTML;
                                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
                                        setTimeout(() => {
                                            icon.innerHTML = originalPath;
                                        }, 2000);
                                    });
                                }
                            </script>

                            <!-- Action Buttons Row -->
                            <div class="mt-6 flex flex-row gap-3 sm:gap-4 max-w-lg items-center">
                                <!-- Buy Now -->
                                <div class="flex-1">
                                    <livewire:add-to-cart-button :product-id="$product->id" variant="buy"
                                        :key="'buy-now-' . $product->id" />
                                </div>

                                <!-- Add to Cart -->
                                <div class="flex-1">
                                    <livewire:add-to-cart-button :product-id="$product->id" variant="text"
                                        :key="'add-cart-' . $product->id" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Product Reviews Section -->
                <livewire:product-reviews :product-id="$product->id" />

                <!-- More Products -->
                <div class="mt-8">
                    <div class="flex items-end justify-between mb-4 px-1">
                        <h2 class="text-xl lg:text-3xl font-black text-neutral-dark tracking-tight">Koleksi <span
                                class="text-primary italic">Lainnya</span></h2>
                        <a href="{{ route('products.index') }}"
                            class="text-xs font-bold text-primary hover:underline">Lihat
                            Semua</a>
                    </div>
                    <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 lg:gap-8">
                        @foreach(\App\Models\Product::with('category')->where('id', '!=', $product->id)->take(4)->get() as $p)
                            <x-product-card :product="$p" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>