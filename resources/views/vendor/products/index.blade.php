<x-app-layout>
    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6 sm:mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2 sm:mb-4">
                        <a href="{{ route('vendor.dashboard') }}"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 text-slate-400 hover:text-primary transition-colors lg:hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <div class="text-primary font-black uppercase tracking-[0.3em] text-[10px]">Manajemen Produk
                        </div>
                    </div>
                    <h1 class="text-xl sm:text-3xl font-black text-slate-900 tracking-tighter">
                        Katalog <span class="text-primary italic">Produk</span>.
                    </h1>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="{{ route('vendor.dashboard') }}"
                        class="hidden lg:inline-flex text-[10px] sm:text-xs font-black text-slate-400 hover:text-primary transition-colors uppercase tracking-widest mr-4">
                        &larr; Kembali Dashboard
                    </a>
                    <a href="{{ route('vendor.products.create') }}"
                        class="flex-grow sm:flex-grow-0 inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-primary text-white font-black py-2.5 sm:py-3 px-5 sm:px-6 rounded-xl transition-all shadow-lg active:scale-95 text-[9px] sm:text-[10px] uppercase tracking-widest">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Produk
                    </a>
                </div>
            </div>

            @if($products->isEmpty())
                <div
                    class="bg-white rounded-3xl shadow-sm border border-slate-100 p-10 sm:p-20 text-center max-w-2xl mx-auto mt-6">
                    <div
                        class="bg-primary/5 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 transform -rotate-12">
                        <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 mb-2">Belum ada produk</h3>
                    <p class="text-slate-500 text-sm font-medium mb-8">Etalase toko Anda masih kosong. Ayo buat produk
                        pertama Anda sekarang!</p>
                    <a href="{{ route('vendor.products.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">
                        Buat Produk Pertama
                    </a>
                </div>
            @else
                <!-- Desktop Table View -->
                <div class="hidden lg:block bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-5 py-3 text-[8.5px] font-black text-slate-400 uppercase tracking-widest">Produk</th>
                                <th class="px-5 py-3 text-[8.5px] font-black text-slate-400 uppercase tracking-widest">Kategori</th>
                                <th class="px-5 py-3 text-[8.5px] font-black text-slate-400 uppercase tracking-widest">Harga & Stok</th>
                                <th class="px-5 py-3 text-[8.5px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($products as $product)
                                <tr class="group hover:bg-slate-50/50 transition-colors">
                                    <td class="px-5 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="h-9 w-9 flex-shrink-0 rounded-lg overflow-hidden border border-slate-100 bg-slate-50 relative group-hover:border-primary/20 transition-colors">
                                                @if($product->image_url)
                                                    <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ $product->image_url }}" alt="">
                                                @else
                                                    <div class="h-full w-full flex items-center justify-center text-slate-300">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-[11px] font-black text-slate-800 group-hover:text-primary transition-colors line-clamp-1">{{ $product->name }}</div>
                                                <div class="text-[8px] font-bold text-slate-400 uppercase tracking-tight mt-0.5">ID: #{{ $product->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[7.5px] font-black uppercase tracking-widest bg-blue-50 text-blue-500">
                                            {{ $product->category->name ?? 'Tanpa Kategori' }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-[11px] font-black text-slate-700">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                        <div class="text-[8.5px] font-bold text-slate-400 mt-0.5">Stok: <span class="{{ $product->stock <= 5 ? 'text-amber-500 font-black' : '' }}">{{ $product->stock }}</span></div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="flex items-center justify-end gap-1.5 transition-opacity">
                                            <a href="{{ route('vendor.products.edit', $product) }}"
                                                class="w-7 h-7 flex items-center justify-center text-blue-500 bg-blue-50 hover:bg-blue-500 hover:text-white rounded-lg transition-all shadow-sm" title="Edit">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            <form action="{{ route('vendor.products.destroy', $product) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-7 h-7 flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-500 hover:text-white rounded-lg transition-all shadow-sm" title="Hapus">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Touch Device Layout (Cards) -->
                <div class="lg:hidden grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl p-3 shadow-sm border border-slate-100 relative group">
                            <div class="flex gap-3 mb-3">
                                <div class="h-14 w-14 flex-shrink-0 rounded-xl overflow-hidden border border-slate-100 bg-slate-50">
                                    @if($product->image_url)
                                        <img class="h-full w-full object-cover" src="{{ $product->image_url }}" alt="">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-slate-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0 flex-grow">
                                    <div class="text-[8px] font-black text-primary uppercase tracking-widest mb-0.5">{{ $product->category->name ?? 'Uncategorized' }}</div>
                                    <h3 class="font-black text-slate-800 text-[11px] leading-tight line-clamp-2">{{ $product->name }}</h3>
                                    <div class="text-[9px] font-bold text-slate-400 mt-1 uppercase">Stok: <span class="{{ $product->stock <= 5 ? 'text-amber-500 font-black' : '' }}">{{ $product->stock }}</span></div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-2 border-t border-slate-50">
                                <div class="text-xs font-black text-primary italic">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <div class="flex gap-1.5">
                                    <a href="{{ route('vendor.products.edit', $product) }}" class="w-7 h-7 flex items-center justify-center bg-blue-50 text-blue-500 rounded-lg active:scale-90 transition-transform shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                    <form action="{{ route('vendor.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-7 h-7 flex items-center justify-center bg-red-50 text-red-500 rounded-lg active:scale-90 transition-transform shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>