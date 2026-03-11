<x-admin-layout>
    <div class="mb-6 md:mb-8 flex justify-between items-end">
        <div>
            <div class="text-primary font-black uppercase tracking-[0.3em] text-[10px] mb-4">Detail Transaksi</div>
            <h1 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter leading-none">
                Pesanan <span class="text-primary">#{{ $order->id }}</span>.
            </h1>
        </div>
        <a href="{{ route('admin.orders.index') }}"
            class="text-sm font-bold text-slate-400 hover:text-primary transition-colors mb-2">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Order Items -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 sm:p-10">
                <h3 class="text-lg font-black text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                    Daftar Produk
                </h3>
                <div class="space-y-6">
                    @foreach($order->items as $item)
                        <div
                            class="flex items-center gap-6 p-4 rounded-3xl bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <div
                                class="w-16 h-16 bg-white rounded-2xl border border-slate-100 flex-shrink-0 overflow-hidden">
                                <img src="{{ $item->product->image_url }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-bold text-slate-900">{{ $item->product->name }}</h4>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-black text-slate-900">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10 pt-10 border-t border-slate-100 grid grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs text-slate-400 font-bold uppercase tracking-widest">
                            <span>Subtotal Produk</span>
                            <span class="text-slate-600">Rp
                                {{ number_format($order->total_amount - $order->service_fee - $order->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-xs text-slate-400 font-bold uppercase tracking-widest">
                            <span>Ongkos Kirim</span>
                            <span class="text-slate-600">Rp
                                {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-xs text-slate-400 font-bold uppercase tracking-widest">
                            <span>Biaya Layanan</span>
                            <span class="text-slate-600">Rp {{ number_format($order->service_fee, 0, ',', '.') }}</span>
                        </div>
                        <div class="pt-4 flex justify-between text-lg font-black text-primary">
                            <span>Grand Total</span>
                            <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @php
                        $alreadyCredited = \App\Models\WalletTransaction::where('reference_id', $order->id)
                            ->where('type', 'credit')
                            ->exists();
                    @endphp
                    @if(!$alreadyCredited && $order->status !== 'cancelled')
                        <div class="flex items-end justify-end">
                            <form action="{{ route('admin.orders.confirm-payment', $order) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Konfirmasi pembayaran manual untuk pesanan ini? Saldo vendor akan otomatis bertambah.')"
                                    class="px-8 py-5 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-primary/20 hover:scale-[1.05] active:scale-95 transition-all">
                                    Konfirmasi Pembayaran
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 sm:p-10">
                <h3 class="text-lg font-black text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-blue-400 rounded-full"></span>
                    Alamat Pengiriman
                </h3>
                <div class="p-6 rounded-3xl border-2 border-dashed border-slate-100">
                    <p class="text-slate-700 font-medium leading-relaxed">
                        "{{ $order->shipping_address }}"
                    </p>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-8">
            <!-- Customer Card -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 overflow-hidden relative">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full"></div>
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-6 relative">Informasi
                    Pelanggan</h3>
                <div class="flex items-center gap-4 mb-6 relative">
                    <div
                        class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center text-white text-xl font-black">
                        {{ substr($order->user->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-black text-slate-900 text-lg">{{ $order->user->name }}</h4>
                        <p class="text-sm text-slate-500 font-medium">{{ $order->user->email }}</p>
                    </div>
                </div>
                <div class="space-y-1 text-xs font-bold text-slate-500 relative">
                    <p>Referral: <span class="text-slate-900">{{ $order->payment_reference ?? 'None' }}</span></p>
                    <p>Registered: {{ $order->user->created_at->format('M Y') }}</p>
                </div>
            </div>

            <!-- Vendor Card -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 overflow-hidden relative">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-500/5 rounded-full"></div>
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-6 relative">Toko UMKM</h3>
                <div class="space-y-4 relative">
                    <div class="p-4 rounded-2xl bg-slate-50 flex items-center gap-4">
                        <div
                            class="w-10 h-10 bg-white rounded-xl shadow-sm border border-slate-100 flex items-center justify-center text-primary font-black uppercase text-xs">
                            {{ substr($order->vendor->shop_name ?? 'L', 0, 1) }}
                        </div>
                        <h4 class="font-bold text-slate-900">{{ $order->vendor->shop_name ?? 'Sini Jajan Official' }}</h4>
                    </div>
                    @if($order->vendor)
                        <div class="text-[10px] space-y-2 font-bold text-slate-400">
                            <p>Pemilik: <span class="text-slate-600">{{ $order->vendor->user->name }}</span></p>
                            <p>Bergabung: {{ $order->vendor->created_at->format('d M Y') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>