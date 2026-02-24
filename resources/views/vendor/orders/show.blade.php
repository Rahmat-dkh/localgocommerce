<x-app-layout>
    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6 sm:mb-8 flex justify-between items-end">
                <div>
                    <div class="text-primary font-black uppercase tracking-[0.3em] text-[10px] mb-2 sm:mb-4">Detail
                        Pesanan
                    </div>
                    <h1 class="text-xl sm:text-3xl font-black text-slate-900 tracking-tighter">
                        Pesanan <span
                            class="text-primary italic">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>.
                    </h1>
                </div>
                <a href="{{ route('vendor.orders.index') }}"
                    class="text-[10px] sm:text-xs font-black text-slate-400 hover:text-primary transition-colors uppercase tracking-widest">
                    &larr; Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Items and Shipping -->
                <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                    <!-- Products -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-10">
                        <h3 class="text-base sm:text-lg font-black text-slate-900 mb-6 sm:mb-8 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                            Daftar Barang
                        </h3>
                        <div class="space-y-4 sm:space-y-6">
                            @foreach($order->items as $item)
                                <div
                                    class="flex items-center gap-4 sm:gap-6 p-3 sm:p-4 rounded-2xl sm:rounded-3xl bg-slate-50/50 hover:bg-slate-50 transition-colors">
                                    <div
                                        class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-xl sm:rounded-2xl border border-slate-100 flex-shrink-0 overflow-hidden">
                                        <img src="{{ $item->product->image_url }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="text-sm sm:font-bold text-slate-900 font-bold">{{ $item->product->name }}
                                        </h4>
                                        <p
                                            class="text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                            {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xs sm:text-sm font-black text-slate-900 italic">
                                            Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 pt-8 border-t border-slate-100 flex justify-between items-center px-2 sm:px-4">
                            <span
                                class="text-[10px] sm:text-xs font-black text-slate-400 uppercase tracking-widest">Total
                                Pendapatan</span>
                            <span class="text-xl sm:text-2xl font-black text-primary italic">Rp
                                {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-10">
                        <h3 class="text-base sm:text-lg font-black text-slate-900 mb-6 sm:mb-8 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-blue-400 rounded-full"></span>
                            Alamat Pengiriman
                        </h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">
                                        Alamat
                                        Tujuan</p>
                                    <p
                                        class="text-sm sm:text-base text-slate-800 font-bold leading-relaxed whitespace-pre-line">
                                        {{ $order->shipping_address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status and Actions -->
                <div class="space-y-6 sm:space-y-8">
                    <!-- Customer Card -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8">
                        <h3
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-50 pb-2">
                            Informasi
                            Pembeli</h3>
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-slate-900 text-white flex items-center justify-center text-base sm:text-lg font-black capitalize">
                                {{ substr($order->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-sm sm:text-base font-black text-slate-800">{{ $order->user->name }}</h4>
                                <div class="flex items-center gap-2">
                                    <p class="text-[10px] sm:text-[11px] font-black text-primary/70 tracking-tight">
                                        {{ $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? '-')) }}
                                    </p>
                                    @if($order->phone || $order->user->phone)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? ''))) }}"
                                            target="_blank"
                                            class="p-1 bg-emerald-50 text-emerald-500 rounded-lg hover:bg-emerald-100 transition-colors"
                                            title="Hubungi via WhatsApp">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <p
                                    class="text-[9px] sm:text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">
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
                                </p>
                            </div>
                        </div>

                        <!-- Shipping Actions -->
                        @if($order->tracking_number)
                            <div class="mt-4 pt-4 border-t border-slate-50 space-y-3">
                                <div>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Nomor
                                        Resi ({{ strtoupper($order->shipping_courier) }})</p>
                                    <p class="text-xs sm:text-sm font-black text-slate-900 font-mono">
                                        {{ $order->tracking_number }}
                                    </p>
                                </div>
                                @if($order->shipping_label)
                                    <a href="{{ $order->shipping_label }}" target="_blank"
                                        class="flex items-center justify-center gap-3 w-full py-3 sm:py-4 bg-primary text-white font-black text-[10px] sm:text-xs uppercase tracking-widest rounded-xl sm:rounded-2xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                            </path>
                                        </svg>
                                        Cetak Label / Tracking
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Status Controls -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8">
                        <h3
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-50 pb-2">
                            Update Status
                        </h3>
                        <form action="{{ route('vendor.orders.update', $order) }}" method="POST"
                            class="space-y-4 sm:space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <select name="status"
                                    class="w-full px-4 py-2.5 sm:py-3 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs sm:text-sm font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Dikirim
                                    </option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                        Selesai / Diterima</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Dibatalkan</option>
                                </select>
                            </div>

                            <div>
                                <label
                                    class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5 block">Kurir
                                    / No. Resi</label>
                                <input type="text" name="shipping_courier" placeholder="Contoh: JNE - 12345678"
                                    value="{{ $order->shipping_courier }}"
                                    class="w-full px-4 py-2.5 sm:py-3 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs sm:text-sm font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                            </div>

                            <button type="submit"
                                class="w-full py-3 sm:py-3.5 bg-neutral-dark text-white font-black text-[10px] sm:text-xs uppercase tracking-widest rounded-xl hover:bg-neutral-800 transition-all shadow-lg active:scale-95">
                                Update Pesanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>