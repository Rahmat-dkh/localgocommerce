<x-admin-layout>
    <div class="mt-2 mb-2 md:mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-xl md:text-3xl font-black text-neutral-dark tracking-tight">Manajemen Penarikan Dana</h1>
            <p class="text-[10px] md:text-sm text-slate-500 font-medium">Kelola dan verifikasi permintaan penarikan saldo UMKM.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl md:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            UMKM / Toko</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Jumlah</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Informasi Bank</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            Status</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Tanggal</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($payouts as $payout)
                                    <tr>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="font-bold text-slate-900 text-xs md:text-sm leading-tight">{{ $payout->vendor->shop_name }}</div>
                                            <div class="text-[9px] md:text-[10px] text-slate-400">{{ $payout->vendor->user->name }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-black text-primary italic">
                                            Rp {{ number_format($payout->amount, 0, ',', '.') }}
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-[9px] md:text-[10px] text-slate-600 leading-snug">
                                            <div class="font-black text-slate-900">{{ $payout->vendor->bank_name }}</div>
                                            <div class="flex items-center gap-1.5 md:gap-2">
                                                <span class="font-mono">{{ $payout->vendor->bank_account_number }}</span>
                                                <button
                                                    onclick="navigator.clipboard.writeText('{{ $payout->vendor->bank_account_number }}')"
                                                    class="p-0.5 hover:bg-slate-100 rounded text-slate-400 hover:text-primary transition-colors"
                                                    title="Salin Rekening">
                                                    <svg class="w-2.5 h-2.5 md:w-3 md:h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="italic text-[8px] md:text-[10px]">a.n {{ $payout->vendor->bank_account_name }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-center">
                                            <span class="px-2 md:px-3 py-0.5 md:py-1 rounded-lg text-[9px] md:text-[10px] font-black uppercase tracking-widest
                                                                                                {{ $payout->status == 'completed' ? 'bg-emerald-50 text-emerald-500' :
                         ($payout->status == 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-red-50 text-red-500') }}">
                                                @php
                                                    $statusTranslations = [
                                                        'pending' => 'Pending',
                                                        'completed' => 'Selesai',
                                                        'rejected' => 'Tolak'
                                                    ];
                                                @endphp
                                                {{ $statusTranslations[$payout->status] ?? $payout->status }}
                                            </span>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-[10px] md:text-xs font-bold text-slate-500">
                                            {{ $payout->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-right flex items-center justify-end gap-1.5 md:gap-2">
                                            @if($payout->status === 'pending')
                                                <form action="{{ route('admin.payouts.update', $payout) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="completed">
                                                    <button type="submit"
                                                        class="px-3 md:px-4 py-1.5 md:py-2 bg-emerald-500 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-emerald-600 transition-all shadow-lg active:scale-95 whitespace-nowrap">Bayar</button>
                                                </form>
                                                <form action="{{ route('admin.payouts.update', $payout) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit"
                                                        class="px-3 md:px-4 py-1.5 md:py-2 bg-rose-500 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-rose-600 transition-all shadow-lg active:scale-95">No</button>
                                                </form>
                                            @else
                                                <span
                                                    class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest italic leading-tight">Paid Out</span>
                                            @endif
                                        </td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>