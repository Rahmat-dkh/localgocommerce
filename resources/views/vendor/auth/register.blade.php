<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-black text-neutral-dark tracking-tighter mb-1">Daftar Tenant Kuliner.</h1>
        <p class="text-xs sm:text-sm text-slate-500 font-medium">Buat akun untuk mulai menyajikan kuliner nusantara.</p>
    </div>

    <form method="POST" action="{{ route('vendor.register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="name" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" value="Email" class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="email" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Shop Name -->
        <div class="mt-3">
            <x-input-label for="shop_name" value="Nama Toko" class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="shop_name" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="text"
                name="shop_name" :value="old('shop_name')" required />
            <x-input-error :messages="$errors->get('shop_name')" class="mt-1" />
        </div>

        <!-- Shop Slug -->
        <div class="mt-3">
            <x-input-label for="shop_slug" value="Link Toko (Slug)"
                class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="shop_slug" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl bg-slate-50" type="text"
                name="shop_slug" :value="old('shop_slug')" required placeholder="nama-toko-anda" />
            <p class="text-[10px] text-slate-400 mt-1.5 font-medium">Link ini akan digunakan sebagai alamat toko Anda
                (contoh: sinijajan.com/toko/<b>nama-toko</b>). Otomatis terisi dari Nama Toko.</p>
            <x-input-error :messages="$errors->get('shop_slug')" class="mt-1" />
        </div>

        <!-- Address -->
        <div class="mt-3">
            <x-input-label for="address" value="Alamat Lengkap" class="text-[10px] uppercase tracking-widest mb-1.5" />
            <textarea id="address" name="address" required
                class="block mt-1 w-full px-4 py-3 text-sm rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm resize-none"
                placeholder="Alamat lengkap toko untuk penjemputan paket">{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-1" />
        </div>

        <div class="grid grid-cols-2 gap-3 mt-3">
            <!-- Postal Code -->
            <div>
                <x-input-label for="postal_code" value="Kode Pos"
                    class="text-[10px] uppercase tracking-widest mb-1.5" />
                <x-text-input id="postal_code" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="text"
                    name="postal_code" :value="old('postal_code')" required />
                <x-input-error :messages="$errors->get('postal_code')" class="mt-1" />
            </div>
            <!-- Shop Phone -->
            <div>
                <x-input-label for="phone" value="No HP Toko" class="text-[10px] uppercase tracking-widest mb-1.5" />
                <x-text-input id="phone" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="text" name="phone"
                    :value="old('phone')" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-1" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" value="Kata Sandi" class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="password" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl" type="password"
                name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi"
                class="text-[10px] uppercase tracking-widest mb-1.5" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full px-4 py-3 text-sm rounded-xl"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                Sudah punya akun?
            </a>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Daftar Sebagai Tenant
            </button>
        </div>
    </form>

    <script>
        const shopNameInput = document.getElementById('shop_name');
        const shopSlugInput = document.getElementById('shop_slug');

        shopNameInput.addEventListener('input', function () {
            let theSlug = this.value.toLowerCase().trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            shopSlugInput.value = theSlug;
        });
    </script>
</x-guest-layout>