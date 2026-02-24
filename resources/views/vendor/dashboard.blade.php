<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
            {{ __('Dashboard Vendor') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Shop Welcome Banner -->
            <div
                class="relative overflow-hidden bg-primary rounded-3xl p-5 sm:p-8 mb-8 text-white shadow-xl shadow-primary/10">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4 sm:gap-6">
                    <div class="text-center md:text-left">
                        <h1 class="text-xl sm:text-3xl font-black mb-1 sm:mb-2 italic">Halo, {{ $vendor->shop_name }}!
                        </h1>
                        <p class="text-primary-light text-[11px] sm:text-sm font-medium opacity-90 max-w-md">Senang
                            melihat Anda kembali. Mari kelola toko dan tingkatkan penjualan hari ini.</p>
                    </div>
                    <div class="flex gap-2 sm:gap-3 w-full md:w-auto">
                        <a href="{{ route('shop.show', $vendor->slug) }}" target="_blank"
                            class="flex-1 md:flex-none px-4 sm:px-6 py-2.5 sm:py-3 bg-white/20 backdrop-blur-md hover:bg-white/30 text-white rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs uppercase tracking-widest transition-all text-center">
                            Lihat Toko Publik
                        </a>
                        <a href="{{ route('vendor.products.create') }}"
                            class="flex-1 md:flex-none px-4 sm:px-6 py-2.5 sm:py-3 bg-white text-primary hover:bg-slate-50 text-[10px] sm:text-xs font-black uppercase tracking-widest rounded-xl sm:rounded-2xl transition-all shadow-lg text-center">
                            + Tambah Produk
                        </a>
                    </div>
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -right-10 -top-10 w-48 h-48 sm:w-64 sm:h-64 bg-white/10 rounded-full blur-3xl">
                </div>
                <div class="absolute -left-10 -bottom-10 w-32 h-32 sm:w-48 sm:h-48 bg-black/10 rounded-full blur-2xl">
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                <!-- Wallet Card -->
                <div
                    class="bg-white p-3.5 sm:p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                        <div
                            class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[8px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest truncate">
                                Saldo Dompet</p>
                            <h3 class="text-base sm:text-lg font-black text-slate-800 truncate">Rp
                                {{ number_format($balance, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                    <a href="{{ route('vendor.wallet.index') }}"
                        class="flex items-center justify-center w-full py-1.5 sm:py-2 bg-slate-50 text-slate-600 hover:text-primary hover:bg-primary/5 rounded-xl text-[8px] sm:text-[9px] font-black uppercase tracking-widest transition-all">
                        Kelola &rarr;
                    </a>
                </div>

                <!-- Products Card -->
                <div
                    class="bg-white p-3.5 sm:p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                        <div
                            class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[8px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest truncate">
                                Total Produk</p>
                            <h3 class="text-base sm:text-lg font-black text-slate-800 truncate">{{ $productsCount }} <span
                                    class="text-[9px] sm:text-[10px] text-slate-400 font-bold ml-0.5">Aktif</span></h3>
                        </div>
                    </div>
                    <a href="{{ route('vendor.products.index') }}"
                        class="flex items-center justify-center w-full py-1.5 sm:py-2 bg-slate-50 text-slate-600 hover:text-primary hover:bg-primary/5 rounded-xl text-[8px] sm:text-[9px] font-black uppercase tracking-widest transition-all">
                        Lihat <span class="hidden sm:inline ml-1">Semua</span> &rarr;
                    </a>
                </div>

                <!-- Orders Card -->
                <div
                    class="bg-white p-3.5 sm:p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                        <div
                            class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[8px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest truncate">
                                Total Pesanan</p>
                            <h3 class="text-base sm:text-lg font-black text-slate-800 truncate">{{ $ordersCount }} <span
                                    class="text-[9px] sm:text-[10px] text-slate-400 font-bold ml-0.5">Transaksi</span></h3>
                        </div>
                    </div>
                    <a href="{{ route('vendor.orders.index') }}"
                        class="flex items-center justify-center w-full py-1.5 sm:py-2 bg-slate-50 text-slate-600 hover:text-primary hover:bg-primary/5 rounded-xl text-[8px] sm:text-[9px] font-black uppercase tracking-widest transition-all">
                        Riwayat &rarr;
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Orders Table -->
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base font-black text-slate-800 tracking-tight flex items-center gap-2">
                            <span class="w-1 h-5 bg-primary rounded-full"></span>
                            Pesanan Terbaru
                        </h3>
                        <a href="{{ route('vendor.orders.index') }}"
                            class="text-[10px] font-bold text-primary hover:underline uppercase tracking-widest">Detail
                            →</a>
                    </div>

                    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                        @if($recentOrders->isNotEmpty())
                            <!-- Desktop Table -->
                            <div class="hidden sm:block overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-slate-50/50">
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                                ID</th>
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                                Pembeli</th>
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                                Barang</th>
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                                Pendapatan</th>
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                                Status</th>
                                            <th
                                                class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        @foreach($recentOrders as $order)
                                                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                                                            <span
                                                                                class="text-xs font-black text-slate-800 tracking-tight group-hover:text-primary transition-colors">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            <div class="flex flex-col">
                                                                                <span
                                                                                    class="text-xs font-bold text-slate-800">{{ $order->user->name }}</span>
                                                                                <div class="flex items-center gap-2">
                                                                                    <span
                                                                                        class="text-[10px] font-black text-primary/70 tracking-tight">{{ $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()->phone ?? '-')) }}</span>
                                                                                    @if($order->phone || $order->user->phone || $order->user->addresses()->exists())
                                                                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()->phone ?? ''))) }}"
                                                                                            target="_blank"
                                                                                            class="text-emerald-500 hover:text-emerald-600 transition-colors"
                                                                                            title="WhatsApp">
                                                                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                                                                            </svg>
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                                <span
                                                                                    class="text-[9px] font-black text-slate-400 italic lowercase">{{ $order->created_at->format('d M, H:i') }}</span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="px-6 py-4">
                                                                            <div class="space-y-1">
                                                                                @foreach($order->items->take(2) as $item)
                                                                                    <div class="text-[11px] font-medium text-slate-600 line-clamp-1 italic">
                                                                                        {{ $item->product->name }} <span
                                                                                            class="text-[9px] font-black text-slate-300">x{{ $item->quantity }}</span>
                                                                                    </div>
                                                                                @endforeach
                                                                                @if($order->items->count() > 2)
                                                                                    <div class="text-[8px] font-black text-slate-300 italic">+
                                                                                        {{ $order->items->count() - 2 }} lainnya
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                         <td class="px-6 py-4 whitespace-nowrap">
                                                                             <span class="text-xs font-black text-primary italic">Rp
                                                                                 {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</span>
                                                                         </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                                                            <span
                                                                                class="px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest
                                                                                                                                                        {{ $order->status === 'completed' || $order->status === 'processing' ? 'bg-emerald-50 text-emerald-500' :
                                            ($order->status === 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-slate-50 text-slate-400') }}">
                                                                                {{ $order->status }}
                                                                            </span>
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                                                            <div class="flex items-center justify-end gap-2">
                                                                                @if($order->shipping_label)
                                                                                    <a href="{{ $order->shipping_label }}" target="_blank"
                                                                                        class="inline-flex items-center justify-center w-8 h-8 bg-emerald-50 text-emerald-500 rounded-xl hover:bg-emerald-500 hover:text-white transition-all shadow-sm border border-emerald-100"
                                                                                        title="Cetak Label / Tracking">
                                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                                            viewBox="0 0 24 24">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                                stroke-width="2"
                                                                                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </a>
                                                                                @endif
                                                                                <a href="{{ route('vendor.orders.show', $order) }}"
                                                                                    class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95">
                                                                                    Detail
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile Cards -->
                            <div class="sm:hidden divide-y divide-slate-50">
                                @foreach($recentOrders as $order)
                                                    <div class="p-3.5 hover:bg-slate-50/50 transition-colors">
                                                        <div class="flex justify-between items-start mb-3">
                                                            <div>
                                                                <div class="flex items-center gap-2 mb-1">
                                                                    <span
                                                                        class="text-[9px] font-black text-primary uppercase tracking-widest">ID
                                                                        #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                                                    <span
                                                                        class="px-1.5 py-0.5 rounded text-[7px] font-black uppercase tracking-widest
                                                                                {{ $order->status === 'completed' || $order->status === 'processing' ? 'bg-emerald-50 text-emerald-500' :
                                    ($order->status === 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-slate-50 text-slate-400') }}">
                                                                        {{ $order->status }}
                                                                    </span>
                                                                </div>
                                                                <span class="text-xs font-black text-slate-800">{{ $order->user->name }}</span>
                                                            </div>
                                                            <div class="text-right">
                                                                <div
                                                                    class="text-[8px] font-bold text-slate-400 uppercase tracking-tight italic">
                                                                    {{ $order->created_at->format('d M, H:i') }}</div>
                                                                 <div class="text-xs font-black text-primary italic leading-none">Rp
                                                                     {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center justify-between gap-1.5 pt-3 border-t border-slate-50">
                                                            <div class="flex items-center gap-2">
                                                                <span
                                                                    class="text-[10px] font-black text-slate-700 tracking-tight">{{ $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()->phone ?? '-')) }}</span>
                                                                @if($order->phone || $order->user->phone || $order->user->addresses()->exists())
                                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()->phone ?? ''))) }}"
                                                                        target="_blank"
                                                                        class="w-5 h-5 rounded bg-emerald-50 text-emerald-500 flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all">
                                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                                            <path
                                                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                                                        </svg>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="flex items-center gap-1.5">
                                                                @if($order->shipping_label)
                                                                    <a href="{{ $order->shipping_label }}" target="_blank"
                                                                        class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center border border-emerald-100 shadow-sm active:scale-95"
                                                                        title="Cetak / Tracking">
                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                                            </path>
                                                                        </svg>
                                                                    </a>
                                                                @endif
                                                                <a href="{{ route('vendor.orders.show', $order) }}"
                                                                    class="px-3.5 py-2 bg-slate-900 text-white text-[8px] font-black uppercase tracking-widest rounded-lg shadow-md active:scale-95">Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-16 text-center">
                                <div
                                    class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-slate-800 font-black mb-1">Belum Ada Pesanan</h4>
                                <p class="text-slate-400 text-sm italic">Sabar ya, rejeki tidak akan tertukar!</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Shop Quick Settings -->
                <div>
                    <h3 class="text-base font-black text-slate-800 tracking-tight mb-4 flex items-center gap-2">
                        <span class="w-1 h-5 bg-slate-300 rounded-full"></span>
                        Pengaturan Toko
                    </h3>
                    <div class="bg-white p-5 sm:p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                        <form action="{{ route('vendor.settings.update') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Nama Toko</label>
                                    <input type="text" name="shop_name" value="{{ $vendor->shop_name }}"
                                        class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-sm font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Ongkir Flat</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-slate-400 font-bold text-xs">Rp</span>
                                        </div>
                                        <input type="number" name="flat_shipping_cost" value="{{ $vendor->flat_shipping_cost }}"
                                            class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-sm font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Deskripsi Singkat</label>
                                <textarea name="description" rows="2"
                                    class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all resize-none">{{ $vendor->description }}</textarea>
                            </div>

                            <div class="pt-3 border-t border-slate-50">
                                <h4 class="text-[10px] font-black text-slate-800 uppercase tracking-widest mb-3">Kurir Aktif</h4>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach(['jne' => 'JNE', 'sicepat' => 'SiCepat', 'jnt' => 'J&T', 'anteraja' => 'Anteraja'] as $code => $name)
                                        <label class="flex items-center p-2 rounded-lg bg-slate-50 border border-transparent hover:border-primary/20 cursor-pointer transition-all group">
                                            <input type="checkbox" name="available_couriers[]" value="{{ $code }}" 
                                                {{ in_array($code, $vendor->available_couriers ?? ['jne', 'sicepat', 'jnt', 'anteraja']) ? 'checked' : '' }}
                                                class="w-3.5 h-3.5 rounded border-slate-300 text-primary focus:ring-primary transition-all">
                                            <span class="ml-2 text-[11px] font-bold text-slate-700 group-hover:text-primary transition-colors">{{ $name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="pt-3 border-t border-slate-50">
                                <h4 class="text-[10px] font-black text-slate-800 uppercase tracking-widest mb-3">Lokasi & Kontak</h4>
                                <div class="space-y-3">
                                    <div>
                                        <input type="text" name="address" value="{{ $vendor->address }}" placeholder="Alamat Lengkap" required
                                            class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <input type="text" name="postal_code" value="{{ $vendor->postal_code }}" placeholder="Kodepos" required
                                            class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                        <input type="text" name="phone" value="{{ $vendor->phone }}" placeholder="No HP" required
                                            class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 border-t border-slate-50">
                                <h4 class="text-[10px] font-black text-slate-800 uppercase tracking-widest mb-3">Rekening Bank</h4>
                                <div class="space-y-3">
                                    <input type="text" name="bank_name" value="{{ $vendor->bank_name }}" placeholder="Nama Bank (BCA, Mandiri, dll)"
                                        class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    <div class="grid grid-cols-1 gap-3">
                                        <input type="text" name="bank_account_number" value="{{ $vendor->bank_account_number }}" placeholder="Nomor Rekening"
                                            class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                        <input type="text" name="bank_account_name" value="{{ $vendor->bank_account_name }}" placeholder="Atas Nama"
                                            class="w-full px-3 py-2.5 bg-slate-50 border-transparent rounded-xl text-slate-800 text-xs font-bold focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all">
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-3 bg-neutral-dark text-white font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-neutral-800 transition-all shadow-lg active:scale-95">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>