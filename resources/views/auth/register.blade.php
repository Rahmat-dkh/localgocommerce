<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-black text-neutral-dark tracking-tighter mb-1">Daftar Pembeli.</h1>
        <p class="text-xs sm:text-sm text-slate-500 font-medium">Buat akun untuk mulai belanja produk kuliner nusantara
            terbaik.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Nama
                Lengkap</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl text-slate-900 text-sm font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-300"
                placeholder="Nama Anda">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <label for="email"
                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl text-slate-900 text-sm font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-300"
                placeholder="nama@email.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <label for="password"
                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Kata
                Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl text-slate-900 text-sm font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-300"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <label for="password_confirmation"
                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Konfirmasi
                Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password"
                class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl text-slate-900 text-sm font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-300"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="mt-6 space-y-3">
            <button type="submit"
                class="w-full h-12 bg-primary text-white font-black rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all active:scale-95 text-sm">
                Daftar Sekarang
            </button>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-slate-100"></div>
                <span
                    class="flex-shrink mx-3 text-[10px] font-black text-slate-300 uppercase tracking-widest">Atau</span>
                <div class="flex-grow border-t border-slate-100"></div>
            </div>

            <a href="{{ route('social.redirect', 'google') }}"
                class="flex items-center justify-center gap-2 w-full h-12 bg-white border-2 border-slate-100 text-neutral-dark font-black rounded-xl shadow-md shadow-black/5 hover:bg-slate-50 transition-all active:scale-95 text-sm">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5">
                Daftar dengan Google
            </a>
        </div>

        <div class="mt-5 text-center">
            <p class="text-xs font-bold text-slate-500">Sudah punya akun? <a href="{{ route('login') }}"
                    class="text-primary hover:text-primary-dark transition-colors">Masuk Sekarang</a></p>
        </div>
    </form>

    <div class="mt-6 pt-4 border-t border-slate-100 text-center">
        <p class="text-xs font-medium text-slate-500 mb-2">ingin berjualan di Sini Jajan?</p>
        <a href="{{ route('vendor.register') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-neutral-dark text-white text-sm font-bold rounded-xl hover:bg-neutral-800 transition-all shadow-md shadow-neutral-dark/20 w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
            </svg>
            Daftar Sebagai Tenant
        </a>
    </div>
</x-guest-layout>