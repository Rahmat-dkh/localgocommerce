<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="pt-10 sm:pt-24 pb-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight italic">Selesaikan <span
                        class="text-primary">Pesanan</span></h2>
                <p class="text-slate-500 text-[10px] sm:text-sm font-medium mt-1">Periksa detail pesanan dan pilih
                    alamat pengiriman Anda.</p>
            </div>

            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Left Column: Details -->
                    <div class="lg:col-span-2 space-y-6 sm:space-y-8">

                        <!-- Address Selection -->
                        <div class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] shadow-sm border border-slate-100 p-5 sm:p-10"
                            data-aos="fade-up">
                            <div
                                class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 sm:mb-8">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight">Alamat
                                        Pengiriman</h3>
                                </div>
                                <a href="{{ route('addresses.create', ['redirect' => 'checkout']) }}"
                                    class="text-[10px] sm:text-xs font-black text-primary hover:text-primary-dark uppercase tracking-widest flex items-center gap-1 group">
                                    + Tambah Alamat Lain
                                    <span class="block w-0 group-hover:w-4 h-0.5 bg-primary transition-all"></span>
                                </a>
                            </div>

                            @if($addresses->isEmpty())
                                <div
                                    class="text-center py-8 sm:py-10 bg-slate-50 rounded-[1.5rem] sm:rounded-[2rem] border-2 border-dashed border-slate-200">
                                    <p class="text-[10px] sm:text-xs text-slate-500 font-bold mb-4">Anda belum memiliki
                                        alamat tersimpan.</p>
                                    <a href="{{ route('addresses.create', ['redirect' => 'checkout']) }}"
                                        class="inline-flex px-6 sm:px-8 py-2.5 sm:py-3 bg-primary text-white font-black rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all text-[9px] sm:text-[10px] uppercase tracking-widest">
                                        Tambah Alamat Sekarang
                                    </a>
                                </div>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                    @foreach($addresses as $addr)
                                        <label
                                            class="relative flex flex-col p-4 sm:p-6 bg-white border-2 rounded-[1.5rem] sm:rounded-[2rem] cursor-pointer hover:border-primary/20 transition-all group has-[:checked]:border-primary has-[:checked]:bg-primary/5 shadow-sm">
                                            <input type="radio" name="address_id" value="{{ $addr->id }}"
                                                {{ $userAddress && $userAddress->id == $addr->id ? 'checked' : '' }}
                                                class="address-selector absolute top-4 sm:top-6 right-4 sm:right-6 h-4 w-4 sm:h-5 sm:w-5 text-primary border-slate-200 focus:ring-primary/20 transition-all">
                                            <div class="pr-6 sm:pr-8">
                                                <div
                                                    class="text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 group-hover:text-primary transition-colors">
                                                    {{ $addr->name }}</div>
                                                <div class="text-slate-900 font-black text-xs sm:text-sm mb-1.5 sm:mb-2">
                                                    {{ $addr->phone }}</div>
                                                <p
                                                    class="text-slate-500 text-[10px] sm:text-xs font-medium leading-relaxed italic line-clamp-2 sm:line-clamp-none">
                                                    {{ $addr->address_line }}, {{ $addr->city }}, {{ $addr->province }}
                                                    {{ $addr->postal_code }}
                                                </p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Order Groups -->
                        @foreach($orderGroups as $group)
                            <div class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden"
                                data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                                <div
                                    class="px-5 sm:px-8 py-4 sm:py-6 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 shadow-sm">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <h3
                                            class="font-black text-slate-800 text-[10px] sm:text-sm uppercase tracking-wider">
                                            {{ $group['vendor_name'] }}</h3>
                                    </div>
                                    <div
                                        class="text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                        {{ count($group['products']) }} Item
                                    </div>
                                </div>

                                <div class="p-5 sm:p-8 space-y-4 sm:space-y-6">
                                    @foreach($group['products'] as $product)
                                        <div class="flex items-center justify-between gap-4">
                                            <div class="flex items-center gap-3 sm:gap-4">
                                                <div
                                                    class="w-12 h-12 sm:w-16 sm:h-16 bg-slate-50 rounded-xl sm:rounded-2xl border border-slate-100 overflow-hidden shrink-0">
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center text-slate-200">
                                                            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-xs sm:text-sm font-black text-slate-800 mb-0.5 sm:mb-1 leading-tight line-clamp-1 truncate">
                                                        {{ $product->name }}</h4>
                                                    <p
                                                        class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                                        {{ $product->cart_qty }} x Rp
                                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-xs sm:text-sm font-black text-slate-800 tracking-tight">Rp
                                                    {{ number_format($product->price * $product->cart_qty, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if(!empty($group['available_rates']))
                                        <div class="mt-4 pt-4 border-t border-slate-50">
                                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Pilih Kurir Pengiriman</label>
                                            <select name="shipping_service[{{ $group['vendor_id'] ?? 'default' }}]" 
                                                class="shipping-selector w-full px-4 py-2.5 bg-slate-50 border-transparent rounded-xl text-xs font-bold text-slate-700 focus:bg-white focus:border-primary transition-all"
                                                data-vendor="{{ $group['vendor_id'] ?? 'default' }}"
                                                data-subtotal="{{ $group['subtotal'] }}"
                                                data-service="{{ $group['service_fee'] }}">
                                                @foreach($group['available_rates'] as $rate)
                                                    <option value="{{ $rate['courier_code'] }}|{{ $rate['courier_service_code'] }}|{{ $rate['price'] }}" 
                                                        {{ $rate['price'] == $group['shipping_cost'] ? 'selected' : '' }}>
                                                        {{ strtoupper($rate['courier_name']) }} - {{ $rate['courier_service_name'] }} (Rp {{ number_format($rate['price'], 0, ',', '.') }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <div
                                        class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-slate-50 space-y-1.5 sm:space-y-2">
                                        <div
                                            class="flex justify-between text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            <span>Subtotal</span>
                                            <span class="text-slate-600">Rp
                                                {{ number_format($group['subtotal'], 0, ',', '.') }}</span>
                                        </div>
                                        <div
                                            class="flex justify-between text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            <span>Ongkos Kirim</span>
                                            <span class="text-slate-600 shipping-cost-display" data-vendor="{{ $group['vendor_id'] ?? 'default' }}">Rp
                                                {{ number_format($group['shipping_cost'], 0, ',', '.') }}</span>
                                        </div>
                                        <div
                                            class="flex justify-between text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            <span>Biaya Layanan</span>
                                            <span class="text-slate-600">Rp
                                                {{ number_format($group['service_fee'], 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex justify-between pt-2 sm:pt-3">
                                            <span class="text-xs font-black text-slate-800 uppercase tracking-wider">Total
                                                Toko Ini</span>
                                            <span class="text-xs sm:text-sm font-black text-primary group-total-display" data-vendor="{{ $group['vendor_id'] ?? 'default' }}">Rp
                                                {{ number_format($group['total'], 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right Column: Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-neutral-dark rounded-[1.5rem] sm:rounded-[2.5rem] p-6 sm:p-10 text-white shadow-2xl shadow-neutral-dark/20 sticky top-24 overflow-hidden group"
                            data-aos="fade-up" data-aos-delay="300">
                            <h3 class="text-lg sm:text-xl font-black italic tracking-tight mb-6 sm:mb-8">Ringkasan <span
                                    class="text-primary italic">Belanja</span></h3>

                            <div class="space-y-3 sm:space-y-4 mb-8 sm:mb-10 relative z-10">
                                <div
                                    class="flex justify-between items-center text-slate-400 font-bold uppercase tracking-widest text-[9px] sm:text-[10px]">
                                    <span>Total Tagihan</span>
                                    <span>{{ count($orderGroups) }} Toko</span>
                                </div>
                                <div class="flex justify-between items-end border-b border-white/5 pb-5 sm:pb-6">
                                    <div class="text-2xl sm:text-3xl font-black text-white tracking-tighter">
                                        <span
                                            class="text-[10px] sm:text-xs align-top mt-1 mr-1">Rp</span><span id="grand-total-display">{{ number_format($grandTotal, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-4 sm:py-5 bg-primary text-white font-black rounded-xl sm:rounded-2xl shadow-xl shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95 text-[10px] sm:text-xs uppercase tracking-[0.2em] relative z-10">
                                Bayar Sekarang →
                            </button>

                            <!-- Decorations -->
                            <div
                                class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="absolute -left-10 -top-10 w-24 h-24 bg-white/5 rounded-full blur-2xl"></div>
                        </div>

                        <div
                            class="mt-4 sm:mt-6 p-4 sm:p-6 bg-slate-100 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 flex items-center gap-3 sm:gap-4 font-bold">
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-white border border-slate-300 flex items-center justify-center text-slate-400 shrink-0">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <p
                                class="text-[9px] sm:text-[10px] text-slate-500 leading-relaxed uppercase tracking-tighter">
                                Keamanan transaksi terjamin dengan sistem enkripsi dan partner resmi.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectors = document.querySelectorAll('.shipping-selector');
            const formatRupiah = (number) => {
                return new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 0
                }).format(number);
            };

            const updateTotals = () => {
                let grandTotal = 0;
                
                selectors.forEach(selector => {
                    const vendorId = selector.dataset.vendor;
                    const subtotal = parseInt(selector.dataset.subtotal);
                    const service = parseInt(selector.dataset.service);
                    
                    const selectedValue = selector.value;
                    const parts = selectedValue.split('|');
                    const shippingPrice = parts.length === 3 ? parseInt(parts[2]) : 0;
                    
                    const groupTotal = subtotal + service + shippingPrice;
                    grandTotal += groupTotal;
                    
                    // Update group displays
                    document.querySelector(`.shipping-cost-display[data-vendor="${vendorId}"]`).innerText = 'Rp ' + formatRupiah(shippingPrice);
                    document.querySelector(`.group-total-display[data-vendor="${vendorId}"]`).innerText = 'Rp ' + formatRupiah(groupTotal);
                });
                
                // Update grand total
                document.getElementById('grand-total-display').innerText = formatRupiah(grandTotal);
            };

            selectors.forEach(selector => {
                selector.addEventListener('change', updateTotals);
            });

            // Address Change -> Reload with new rates
            const addressRadios = document.querySelectorAll('.address-selector');
            addressRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const url = new URL(window.location.href);
                    url.searchParams.set('address_id', this.value);
                    window.location.href = url.toString();
                });
            });
        });
    </script>
</x-app-layout>