<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen pt-20 sm:pt-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-8">
                <div>
                    <h2 class="text-2xl sm:text-4xl font-black text-slate-900 tracking-tighter">Riwayat <span class="text-primary italic">Pesanan</span></h2>
                    <p class="text-slate-500 text-[10px] sm:text-sm font-medium mt-1">Pantau status dan detail pembelanjaan Anda di sini.</p>
                </div>
                <a href="{{ route('products.index') }}" 
                    class="px-5 py-2.5 bg-white text-slate-600 font-black rounded-xl border border-slate-200 hover:bg-slate-50 transition-all shadow-sm text-[10px] uppercase tracking-widest">
                    Lanjut Belanja →
                </a>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-5 py-3 rounded-2xl mb-6 flex items-center gap-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-bold text-[11px] sm:text-xs">{{ session('success') }}</span>
                </div>
            @endif

            @if($orders->isEmpty())
                <div class="bg-white rounded-[2rem] p-10 sm:p-16 text-center border border-slate-100 shadow-sm">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-5">
                        <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-black text-slate-800 mb-2">Belum Ada Pesanan</h3>
                    <p class="text-xs text-slate-400 font-medium mb-6">Sepertinya Anda belum melakukan transaksi apa pun.</p>
                    <a href="{{ route('products.index') }}" 
                        class="inline-flex px-8 py-3.5 bg-primary text-white font-black rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95 text-[10px] uppercase tracking-widest">
                        Mulai Belanja
                    </a>
                </div>
            @else
                <div class="space-y-4 sm:space-y-6">
                    @foreach($orders as $order)
                        <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow group"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Order Header -->
                            <div class="px-5 sm:px-8 py-4 sm:py-5 bg-slate-50/50 border-b border-slate-100 flex flex-wrap justify-between items-center gap-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-primary shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Ord #{{ $order->id }}</div>
                                        <div class="text-slate-800 font-black text-xs sm:text-sm">{{ $order->created_at->format('d M Y • H:i') }} WIB</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 sm:gap-10">
                                    <div class="text-right hidden sm:block">
                                        <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Total Bayar</div>
                                        <div class="text-primary font-black text-xl italic leading-none">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="px-4 py-1.5 rounded-xl font-black text-[10px] uppercase tracking-widest shadow-sm
                                        @if($order->status == 'completed') bg-emerald-100 text-emerald-600
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-600
                                        @elseif($order->status == 'cancelled') bg-rose-100 text-rose-600
                                        @else bg-amber-100 text-amber-600 @endif">
                                        @php
                                            $statusTranslations = [
                                                'pending' => 'Menunggu Pembayaran',
                                                'processing' => 'Sedang Diproses',
                                                'shipped' => 'Dalam Pengiriman',
                                                'delivered' => 'Selesai / Diterima',
                                                'cancelled' => 'Dibatalkan',
                                                'completed' => 'Selesai'
                                            ];
                                        @endphp
                                        {{ $statusTranslations[$order->status] ?? $order->status }}
                                    </div>
                                </div>
                            </div>

                            <!-- Order Body -->
                            <div class="px-5 sm:px-8 py-5 sm:py-6">
                                <div class="mb-4 flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Toko:</span>
                                    <span class="text-xs font-bold text-slate-700">{{ $order->vendor->shop_name ?? 'LocalGo Official' }}</span>
                                </div>

                                <div class="space-y-3">
                                    @foreach($order->items as $item)
                                        <div class="flex items-center justify-between gap-3 p-3 rounded-2xl bg-slate-50/30 border border-slate-100/50">
                                            <div class="flex items-center gap-3 shrink-0">
                                                <div class="w-12 h-12 rounded-xl bg-white border border-slate-100 overflow-hidden shrink-0">
                                                    @php
                                                        $imagePath = $item->product ? $item->product->image : null;
                                                        $src = '';
                                                        if ($imagePath) {
                                                            if (str_starts_with($imagePath, 'http')) {
                                                                $src = $imagePath;
                                                            } elseif (str_starts_with($imagePath, 'products/')) {
                                                                $src = asset('storage/' . $imagePath);
                                                            } else {
                                                                $src = asset('images/' . $imagePath);
                                                            }
                                                        }
                                                    @endphp
                                                    @if($src)
                                                        <img src="{{ $src }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-slate-50 text-slate-200">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="min-w-0">
                                                    <h4 class="text-xs sm:text-sm font-black text-slate-800 leading-tight mb-1 truncate">{{ $item->product->name ?? 'Produk Tidak Tersedia' }}</h4>
                                                    <p class="text-[8px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-xs sm:text-sm font-black text-slate-800 tracking-tight italic">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="mt-6 pt-5 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <div class="text-[9px] font-bold text-slate-400 uppercase tracking-widest italic flex items-center gap-1 min-w-0">
                                        <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="truncate sm:whitespace-normal sm:break-all">Ref: {{ $order->payment_reference }}</span>
                                    </div>
                                    <div class="flex items-center justify-between w-full sm:w-auto gap-3">
                                        <div class="sm:hidden">
                                            <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Total</div>
                                            <div class="text-primary font-black text-sm">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="flex gap-2">
                                            @if($order->status == 'pending')
                                                <a href="{{ route('checkout.finish') }}?order_id={{ $order->payment_reference }}" 
                                                    class="px-4 py-2 bg-emerald-500 text-white font-black rounded-lg hover:bg-emerald-600 transition-all text-[9px] uppercase tracking-widest shadow-lg shadow-emerald-500/20">
                                                    Cek Pembayaran
                                                </a>
                                            @endif
                                            <a href="{{ route('orders.show', $order) }}" class="px-4 py-2 bg-slate-100 text-slate-600 font-black rounded-lg hover:bg-slate-200 transition-all text-[9px] uppercase tracking-widest text-center flex items-center">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
