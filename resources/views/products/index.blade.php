<x-app-layout>
    <div class="pt-28 lg:pt-40 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Eksplorasi UMKM</div>
                <h1 class="text-3xl lg:text-5xl font-black text-slate-900 tracking-tighter leading-none mb-8">
                    Koleksi <span class="text-primary italic">Terbaik</span>.
                </h1>
                <div class="max-w-2xl mx-auto px-4">
                    <form action="{{ route('products.index') }}" method="GET" class="relative group">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                            class="w-full px-8 py-5 bg-white border-2 border-slate-100 rounded-3xl text-lg font-bold text-slate-900 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all shadow-xl shadow-slate-200/50">
                        <button type="submit"
                            class="absolute right-4 top-1/2 -translate-y-1/2 p-3 bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 hover:scale-105 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Horizontal Category Sub-Nav -->
            <div class="w-full border-b border-gray-100 mb-20 overflow-x-auto no-scrollbar">
                <div class="flex justify-center space-x-12 min-w-max pb-4 px-4 overflow-x-auto no-scrollbar">
                    <a href="{{ route('products.index') }}" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"
                        class="text-[17px] font-bold transition-all relative pb-4 {{ !request('category') && !request()->routeIs('categories.*') ? 'text-primary' : 'text-gray-400 hover:text-primary' }}">
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
                        <a href="{{ route('products.index', ['category' => $cat->id]) }}"
                            onclick="window.scrollTo({top: 0, behavior: 'smooth'});"
                            class="text-[17px] font-bold transition-all relative pb-4 {{ request('category') == $cat->id ? 'text-primary' : 'text-gray-400 hover:text-primary' }}">
                            {{ $cat->name }}
                            @if(request('category') == $cat->id)
                                <div class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Products Grid -->
            <div
                class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-8 sm:gap-x-8 sm:gap-y-16">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <!-- Pagination: Custom Style -->
            <div class="mt-24 flex justify-center">
                <div class="glass p-4 rounded-3xl">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>