<x-admin-layout>
    <div class="mt-2 mb-2 md:mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-xl md:text-3xl font-black text-neutral-dark tracking-tight">Manajemen Pesanan</h1>
            <p class="text-[10px] md:text-sm text-slate-500 font-medium">Pantau dan kelola semua transaksi pelanggan di sini.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl md:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto pb-4">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            ID</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Pelanggan
                        </th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest leading-tight">
                            UMKM / Toko
                        </th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                            Total</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            Status</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Tanggal
                        </th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($orders as $order)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-3 md:px-6 py-3 md:py-4 text-center text-xs font-black text-slate-800">
                                            #{{ $order->id }}
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                            <div class="font-bold text-slate-900 text-xs md:text-sm leading-tight">
                                                {{ $order->user->name }}</div>
                                            <div class="text-[9px] md:text-[10px] text-slate-400">{{ $order->user->email }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                            <span
                                                class="text-[11px] md:text-xs font-bold text-slate-600">{{ $order->vendor->shop_name ?? 'LocalGo' }}</span>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 text-right">
                                            <span class="text-xs md:text-sm font-black text-primary italic whitespace-nowrap">Rp
                                                {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 text-center">
                                            <span class="px-2 md:px-3 py-0.5 md:py-1 rounded-lg text-[9px] md:text-[10px] font-black uppercase tracking-widest 
                                                                                                                    {{ $order->status === 'completed' || $order->status === 'processing' ? 'bg-emerald-50 text-emerald-500' :
                         ($order->status === 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-red-50 text-red-500') }}">
                                                @php
                                                    $statusTranslations = [
                                                        'pending' => 'Pending',
                                                        'processing' => 'Proses',
                                                        'shipped' => 'Kirim',
                                                        'delivered' => 'Selesai',
                                                        'cancelled' => 'Batal',
                                                        'completed' => 'Selesai'
                                                    ];
                                                @endphp
                                                {{ $statusTranslations[$order->status] ?? $order->status }}
                                            </span>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="text-[10px] md:text-[11px] font-bold text-slate-700">
                                                {{ $order->created_at->format('d M Y') }}
                                            </div>
                                            <div class="text-[8px] md:text-[9px] font-black text-slate-400 uppercase">
                                                {{ $order->created_at->format('H:i') }} WIB
                                            </div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 text-right flex items-center justify-end gap-1.5 md:gap-2">
                                            @php
                                                $alreadyCredited = \App\Models\WalletTransaction::where('reference_id', $order->id)
                                                    ->where('type', 'credit')
                                                    ->exists();
                                            @endphp
                                            @if(!$alreadyCredited && $order->status !== 'cancelled')
                                                <form action="{{ route('admin.orders.confirm-payment', $order) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Konfirmasi pembayaran manual? Saldo vendor akan langsung bertambah.')"
                                                        class="px-3 md:px-4 py-1.5 md:py-2 bg-emerald-500 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20 active:scale-95 whitespace-nowrap">
                                                        OK
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.orders.show', $order) }}"
                                                class="inline-flex items-center gap-2 px-3 md:px-4 py-1.5 md:py-2 bg-slate-900 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div
                                    class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <p class="text-slate-400 font-bold">Belum ada pesanan masuk.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->count() > 0)
            <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>