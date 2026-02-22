<x-app-layout>
    <div class="pt-6 lg:pt-8 pb-24">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Eksplorasi UMKM</div>
                <h1 class="text-3xl lg:text-5xl font-black text-slate-900 tracking-tighter leading-none mb-6">
                    Koleksi <span class="text-primary italic">Terbaik</span>.
                </h1>
            </div>

            <!-- Horizontal Category Sub-Nav -->
            <div class="w-full border-b border-gray-100 mb-10 overflow-x-auto no-scrollbar">
                <div class="flex justify-center space-x-12 min-w-max pb-4 px-4 overflow-x-auto no-scrollbar">
                    <a href="{{ route('products.index') }}" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"
                        class="text-sm font-bold transition-all relative pb-3 {{ !request('category') && !request()->routeIs('categories.*') ? 'text-primary' : 'text-gray-400 hover:text-primary' }}">
                        Semua
                        @if(!request('category') && !request()->routeIs('categories.*'))
                            <div class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></div>
                        @else
                            <div
                                class="absolute bottom-0 left-0 w-0 h-1 bg-primary rounded-full group-hover:w-full transition-all">
                            </div>
                        @endif
                    </a>
                    @foreach(\App\Models\Category::all() as $cat)
                        <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
                            class="text-sm font-bold transition-all relative pb-3 flex-shrink-0 {{ request('category') == $cat->slug ? 'text-primary' : 'text-gray-400 hover:text-primary transition-colors' }}">
                            {{ $cat->name }}
                            @if(request('category') == $cat->slug)
                                <div class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Products Grid -->
            <div
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-x-3 gap-y-6 sm:gap-x-6 sm:gap-y-8">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <!-- Pagination: Custom Style -->
            <div class="mt-12 flex justify-center">
                <div class="glass p-4 rounded-3xl">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>