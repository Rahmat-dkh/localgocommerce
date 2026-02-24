<x-app-layout>
    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen pt-20 sm:pt-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <!-- Header -->
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <a href="{{ route('orders.index') }}"
                        class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 flex items-center gap-2 hover:text-primary transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Kembali ke Riwayat
                    </a>
                    <h1 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tighter">Detail <span
                            class="text-primary italic">Pesanan</span></h1>
                    <p class="text-slate-500 text-[10px] sm:text-xs font-medium mt-1 uppercase tracking-widest">Ref:
                        {{ $order->payment_reference }}
                    </p>
                </div>
                <div class="hidden sm:block">
                    <div class="px-4 py-2 rounded-xl font-black text-[10px] uppercase tracking-widest shadow-sm
                        @if($order->status == 'completed') bg-emerald-500 text-white
                        @elseif($order->status == 'processing') bg-blue-500 text-white
                        @elseif($order->status == 'cancelled') bg-rose-500 text-white
                        @else bg-amber-500 text-white @endif">
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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Status Card (Mobile Only) -->
                    <div
                        class="sm:hidden bg-white p-5 rounded-3xl border border-slate-100 shadow-sm flex justify-between items-center">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Status
                            Pesanan</span>
                        <span
                            class="font-black text-xs text-primary uppercase">{{ $statusTranslations[$order->status] ?? $order->status }}</span>
                    </div>

                    <!-- Products Card -->
                    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-50 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <h3 class="font-black text-slate-800 text-sm sm:text-base uppercase tracking-wider">Produk
                                dari
                                <span class="text-primary italic">{{ $order->vendor->shop_name ?? 'UMKM' }}</span>
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-4 group">
                                    <div
                                        class="w-16 h-16 rounded-2xl border border-slate-100 bg-slate-50 overflow-hidden shrink-0 group-hover:border-primary/30 transition-colors">
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
                                        <img src="{{ $src ?: asset('images/no-image.png') }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h4 class="font-black text-slate-800 text-xs sm:text-sm mb-1 leading-tight">
                                            {{ $item->product->name ?? 'Produk Tidak Tersedia' }}
                                        </h4>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-black text-slate-800 text-sm italic">Rp
                                            {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="bg-slate-50/50 p-6 space-y-2">
                            <div
                                class="flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <span>Subtotal</span>
                                <span class="text-slate-600">Rp
                                    {{ number_format($order->total_amount - $order->shipping_cost - $order->service_fee, 0, ',', '.') }}</span>
                            </div>
                            <div
                                class="flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <span>Ongkos Kirim</span>
                                <span class="text-slate-600">Rp
                                    {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                            </div>
                            <div
                                class="flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <span>Biaya Layanan</span>
                                <span class="text-slate-600">Rp
                                    {{ number_format($order->service_fee, 0, ',', '.') }}</span>
                            </div>
                            <div class="pt-3 mt-1 border-t border-slate-200 flex justify-between items-center">
                                <span class="text-xs font-black text-slate-800 uppercase tracking-wider">Total
                                    Pembayaran</span>
                                <span class="text-lg font-black text-primary italic">Rp
                                    {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address Card -->
                    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-50 flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-black text-slate-800 text-sm sm:text-base uppercase tracking-wider">Alamat
                                Pengiriman
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                                <div class="flex items-center gap-2 mb-3">
                                    <span
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Penerima:</span>
                                    <span class="text-xs font-black text-slate-900">{{ $order->user->name }}</span>
                                </div>
                                <p class="text-sm sm:text-base font-bold text-slate-700 leading-relaxed mb-4">
                                    {{ $order->shipping_address }}
                                </p>
                                <div
                                    class="flex items-center gap-2 text-primary font-black text-[10px] sm:text-xs uppercase tracking-widest">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    {{ $order->phone ?? $order->user->phone ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="space-y-6">
                    <!-- Tracking Info -->
                    @if($order->tracking_number)
                        <div
                            class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2rem] p-8 text-white shadow-xl shadow-slate-900/10">
                            <h3 class="text-xs font-black text-white/40 uppercase tracking-[0.2em] mb-6">Lacak Pengiriman
                            </h3>

                            <div class="space-y-4">
                                <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                    <p class="text-[9px] font-black text-white/30 uppercase tracking-widest mb-1">Kurir</p>
                                    <p class="text-sm font-black text-primary italic">
                                        {{ strtoupper($order->shipping_courier) }} <span
                                            class="text-white/40 font-bold not-italic font-sans">-
                                            {{ strtoupper($order->shipping_service) }}</span>
                                    </p>
                                </div>

                                <div class="p-5 rounded-2xl bg-white/5 border border-white/10">
                                    <p class="text-[9px] font-black text-white/30 uppercase tracking-widest mb-1.5">Nomor
                                        Resi
                                    </p>
                                    <div class="flex items-center justify-between gap-2">
                                        <p class="text-sm sm:text-lg font-black text-white tracking-tight break-all">
                                            {{ $order->tracking_number }}
                                        </p>
                                        <button onclick="navigator.clipboard.writeText('{{ $order->tracking_number }}')"
                                            class="p-1.5 hover:bg-white/10 rounded-lg transition-colors text-white/40 hover:text-white"
                                            title="Salin Resi">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 space-y-3">
                                <a href="https://biteship.com/id/tracking/{{ $order->tracking_number }}" target="_blank"
                                    class="flex items-center justify-center w-full py-4 bg-primary text-white font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">
                                    Lacak Secara Real-time &rarr;
                                </a>
                                @if($order->shipping_label)
                                    <a href="{{ $order->shipping_label }}" target="_blank"
                                        class="flex items-center justify-center w-full py-4 bg-white/10 text-white/80 font-black text-[10px] uppercase tracking-widest rounded-2xl hover:bg-white/20 transition-all">
                                        Lihat Label Pengiriman
                                    </a>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-[2rem] p-8 border border-white shadow-sm border-slate-100 text-center">
                            <div
                                class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-5 text-slate-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-sm font-black text-slate-800 mb-2 uppercase tracking-wide">Menunggu Pengiriman
                            </h4>
                            <p class="text-[10px] font-medium text-slate-400">Nomor resi akan muncul secara
                                otomatis setelah UMKM mengirimkan paket Anda.</p>
                        </div>
                    @endif

                    <!-- Need Help Card -->
                    <div class="bg-primary/5 rounded-[2rem] p-8 border border-primary/10 overflow-hidden relative">
                        <div class="absolute -right-8 -bottom-8 w-24 h-24 bg-primary/10 rounded-full"></div>
                        <h4 class="text-[10px] font-black text-primary uppercase tracking-[0.2em] mb-3 relative">Bantuan
                        </h4>
                        <p class="text-xs font-bold text-slate-600 mb-5 relative leading-relaxed">Punya pertanyaan
                            seputar pesanan ini? Chat langsung dengan Penjual.</p>

                        @php
                            $vendorPhone = $order->vendor->phone ?? '';
                            // Format for WhatsApp (remove leading 0 replace with 62)
                            if (str_starts_with($vendorPhone, '0')) {
                                $vendorPhone = '62' . substr($vendorPhone, 1);
                            }
                            $waLink = $vendorPhone ? "https://wa.me/{$vendorPhone}?text=" . urlencode("Halo Toko " . ($order->vendor->shop_name ?? '') . ", saya ingin bertanya tentang pesanan saya dengan nomor referensi #" . $order->payment_reference) : route('shop.show', $order->vendor->slug ?? '');
                        @endphp

                        <a href="{{ $waLink }}" target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20 relative">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Hubungi Seller
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>