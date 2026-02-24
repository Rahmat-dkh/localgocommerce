<x-app-layout>
    <div class="py-6 sm:py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <a href="{{ route('vendor.dashboard') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 text-slate-400 hover:text-primary transition-colors lg:hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </a>
                        <div class="text-primary font-black uppercase tracking-[0.3em] text-[10px]">Riwayat Penjualan</div>
                    </div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tighter">
                        Pesanan <span class="text-primary italic">Masuk</span>.
                    </h1>
                </div>
                <a href="{{ route('vendor.dashboard') }}"
                    class="hidden lg:inline-flex text-xs font-black text-slate-400 hover:text-primary transition-colors uppercase tracking-widest">
                    &larr; Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                @if($orders->isNotEmpty())
                    <!-- Desktop Table -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">ID</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Waktu</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Pembeli</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Pendapatan</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Resi</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($orders as $order)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-6 py-4 text-center">
                                            <span class="text-xs font-black text-slate-800">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-[11px] font-bold text-slate-700">{{ $order->created_at->format('d M Y') }}</div>
                                            <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $order->created_at->format('H:i') }} WIB</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-slate-900 text-sm">{{ $order->user->name }}</div>
                                            <div class="text-[10px] text-slate-400">{{ $order->user->email }}</div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-[10px] font-black text-primary/70">{{ $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? '-')) }}</span>
                                                @if($order->phone || $order->user->phone || $order->user->addresses()->exists())
                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? ''))) }}" target="_blank" class="text-emerald-500 hover:text-emerald-600 transition-colors" title="WhatsApp">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <span class="text-sm font-black text-primary italic">Rp {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest 
                                                {{ $order->status === 'completed' || $order->status === 'processing' ? 'bg-emerald-50 text-emerald-500' :
                                                ($order->status === 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-red-50 text-red-500') }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($order->tracking_number)
                                                <div class="flex items-center justify-center gap-1.5">
                                                    <div class="text-[10px] font-black text-slate-800 uppercase tracking-tighter">{{ $order->tracking_number }}</div>
                                                    <button onclick="navigator.clipboard.writeText('{{ $order->tracking_number }}')" class="p-1 hover:bg-slate-100 rounded text-slate-400 hover:text-primary transition-colors" title="Salin Resi">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                                    </button>
                                                </div>
                                                <div class="text-[8px] font-black text-slate-400 mt-1 uppercase tracking-widest">{{ strtoupper($order->shipping_courier) }} {{ strtoupper($order->shipping_service) }}</div>
                                            @else
                                                <span class="text-[10px] text-slate-300 italic">Belum ada resi</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                @if($order->shipping_label)
                                                    <a href="{{ $order->shipping_label }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 bg-emerald-50 text-emerald-500 rounded-xl hover:bg-emerald-500 hover:text-white transition-all shadow-sm border border-emerald-100" title="Cetak Label / Tracking">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                    </a>
                                                @endif
                                                <a href="{{ route('vendor.orders.show', $order) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95">
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
                        @foreach($orders as $order)
                            <div class="p-3.5 hover:bg-slate-50 transition-colors">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex flex-col">
                                        <span class="text-[9px] font-black text-primary uppercase tracking-widest mb-1">ID #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        <span class="text-xs font-black text-slate-800">{{ $order->user->name }}</span>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="text-[10px] font-black text-primary/70tracking-tight">{{ $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? '-')) }}</span>
                                            @if($order->phone || $order->user->phone || $order->user->addresses()->exists())
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone ?: ($order->user->phone ?: ($order->user->addresses()->latest()->first()?->phone ?? ''))) }}" target="_blank" class="w-5 h-5 rounded bg-emerald-50 text-emerald-500 flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all">
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="px-2 py-0.5 rounded text-[7px] font-black uppercase tracking-widest
                                        {{ $order->status === 'completed' || $order->status === 'processing' ? 'bg-emerald-50 text-emerald-500' :
                                        ($order->status === 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-slate-50 text-slate-400') }}">
                                        {{ $order->status }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center mt-3 pt-3 border-t border-slate-50">
                                    <div class="flex flex-col">
                                        <span class="text-[9px] font-bold text-slate-700">{{ $order->created_at->format('d M Y') }}, {{ $order->created_at->format('H:i') }} WIB</span>
                                        <span class="text-xs font-black text-primary italic mt-0.5">Rp {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        @if($order->shipping_label)
                                            <a href="{{ $order->shipping_label }}" target="_blank" class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center border border-emerald-100 shadow-sm active:scale-95" title="Cetak / Tracking">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                            </a>
                                        @endif
                                        <a href="{{ route('vendor.orders.show', $order) }}" class="px-3.5 py-2 bg-slate-900 text-white text-[8px] font-black uppercase tracking-widest rounded-lg shadow-md active:scale-95">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-20 text-center">
                        <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <p class="text-slate-400 font-bold">Belum ada pesanan masuk.</p>
                    </div>
                @endif
            </div>

            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
