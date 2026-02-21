<x-admin-layout>
    <div class="mt-2 mb-2 md:mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-xl md:text-3xl font-black text-neutral-dark tracking-tight">Manajemen UMKM</h1>
            <p class="text-[10px] md:text-sm text-slate-500 font-medium">Kelola status dan informasi toko UMKM yang terdaftar.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl md:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest leading-tight">
                            Nama Toko (UMKM)</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Pemilik</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center leading-tight">
                            Status</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Join</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($vendors as $vendor)
                                    <tr>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="font-bold text-slate-900 text-xs md:text-sm leading-tight">
                                                {{ $vendor->shop_name }}</div>
                                            <div class="text-[9px] md:text-[10px] text-slate-400 uppercase tracking-tighter">
                                                {{ $vendor->slug }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                            <div class="text-[11px] md:text-sm font-bold text-slate-800 leading-tight">
                                                {{ $vendor->user->name }}</div>
                                            <div class="text-[9px] md:text-[10px] text-slate-400">{{ $vendor->user->email }}</div>
                                        </td>
                                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-center">
                                            <span class="px-2 md:px-3 py-0.5 md:py-1 rounded-lg text-[9px] md:text-[10px] font-black uppercase tracking-widest
                                                                                                {{ $vendor->status == 'active' ? 'bg-emerald-50 text-emerald-500' :
                         ($vendor->status == 'pending' ? 'bg-amber-50 text-amber-500' : 'bg-red-50 text-red-500') }}">
                                                @php
                                                    $statusTranslations = [
                                                        'active' => 'Aktif',
                                                        'pending' => 'Menunggu',
                                                        'suspended' => 'Sus'
                                                    ];
                                                @endphp
                                                {{ $statusTranslations[$vendor->status] ?? $vendor->status }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-[10px] md:text-xs font-bold text-slate-500">
                                            {{ $vendor->created_at->format('d M Y') }}
                                        </td>
                                        <td
                                            class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-right flex items-center justify-end gap-1.5 md:gap-2">
                                            <a href="{{ route('admin.vendors.edit', $vendor) }}"
                                                class="inline-flex items-center px-3 md:px-4 py-1.5 md:py-2 bg-slate-900 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95">Edit</a>
                                            <form action="{{ route('admin.vendors.update', $vendor) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="shop_name" value="{{ $vendor->shop_name }}">
                                                <input type="hidden" name="user_id" value="{{ $vendor->user_id }}">
                                                @if($vendor->status !== 'active')
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit"
                                                        class="px-3 md:px-4 py-1.5 md:py-2 bg-emerald-500 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-emerald-600 transition-all shadow-lg active:scale-95 whitespace-nowrap">OK</button>
                                                @else
                                                    <input type="hidden" name="status" value="suspended">
                                                    <button type="submit"
                                                        class="px-3 md:px-4 py-1.5 md:py-2 bg-rose-500 text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest rounded-lg md:rounded-xl hover:bg-rose-600 transition-all shadow-lg active:scale-95">Sus</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>