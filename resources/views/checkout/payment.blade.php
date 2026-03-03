<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-slate-800 leading-tight">
            Pembayaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-[2.5rem] p-10 text-center border border-slate-100">
                <h3 class="text-2xl sm:text-3xl font-black mb-4 text-slate-900 tracking-tight">Selesaikan <span
                        class="text-primary">Pembayaran</span></h3>
                <p class="text-slate-500 text-sm mb-8 font-medium">Total Tagihan: <span
                        class="font-black text-primary text-xl">Rp
                        {{ number_format($grandTotal, 0, ',', '.') }}</span></p>

                <button id="pay-button"
                    class="bg-primary hover:bg-primary-dark text-white font-black py-4 px-12 rounded-2xl shadow-xl shadow-primary/20 uppercase tracking-[0.2em] text-xs transition-all active:scale-95">
                    Bayar Sekarang
                </button>

                <div class="mt-8 text-sm text-gray-500">
                    Payment Reference: {{ $paymentReference }}
                </div>
            </div>
        </div>
    </div>

    @php
        $snapUrl = config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js';
        $clientKey = config('midtrans.client_key');
    @endphp

    @push('scripts')
        <script src="{{ $snapUrl }}" data-client-key="{{ $clientKey }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function () {
                // SnapToken acquired from previous step
                snap.pay('{{ $snapToken }}', {
                    // Optional
                    onSuccess: function (result) {
                        window.location.href = "{{ route('checkout.finish') }}?order_id={{ $paymentReference }}";
                    },
                    onPending: function (result) {
                        window.location.href = "{{ route('checkout.finish') }}?order_id={{ $paymentReference }}";
                    },
                    onError: function (result) {
                        /* You may add your own implementation here */
                        alert("payment failed!"); console.log(result);
                    },
                    onClose: function () {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                });
            };
        </script>
    @endpush
</x-app-layout>