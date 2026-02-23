<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
                {{ __('Edit Produk') }}
            </h2>
            <a href="{{ route('vendor.products.index') }}"
                class="text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-slate-100">
                <div class="p-6 sm:p-10">
                    <form method="POST" action="{{ route('vendor.products.update', $product) }}"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Product Images Upload -->
                        <div class="space-y-4 mb-8">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Foto
                                Produk (Tambah Baru)</label>

                            <div class="flex flex-wrap gap-4" id="imagePreviewContainer">
                                <label for="images" class="relative group cursor-pointer">
                                    <div
                                        class="w-32 h-32 rounded-2xl bg-slate-50 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden hover:border-primary transition-colors">
                                        <div class="text-center p-2">
                                            <svg class="w-6 h-6 text-slate-400 mx-auto mb-1 group-hover:text-primary transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <p
                                                class="text-[8px] text-slate-500 font-bold uppercase tracking-widest group-hover:text-primary">
                                                Tambah Foto</p>
                                        </div>
                                    </div>
                                    <input id="images" type="file" name="images[]" class="hidden" accept="image/*"
                                        multiple onchange="previewImages(this)">
                                </label>

                                <!-- Existing Gallery Images -->
                                @foreach($product->images as $img)
                                    <div
                                        class="preview-item w-32 h-32 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 relative group">
                                        <img src="{{ $img->image_url }}" class="w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <!-- Potential Delete Button Placeholder -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                            <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" value="Nama Produk"
                                class="text-[10px] uppercase tracking-widest mb-1.5" />
                            <x-text-input id="name"
                                class="block w-full px-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white transition-all"
                                type="text" name="name" :value="old('name', $product->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Category -->
                            <div>
                                <x-input-label for="category_id" value="Kategori"
                                    class="text-[10px] uppercase tracking-widest mb-1.5" />
                                <select id="category_id" name="category_id" required
                                    class="block w-full px-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white focus:border-primary focus:ring-primary transition-all shadow-sm">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Stock -->
                                <div>
                                    <x-input-label for="stock" value="Stok"
                                        class="text-[10px] uppercase tracking-widest mb-1.5" />
                                    <x-text-input id="stock"
                                        class="block w-full px-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white transition-all"
                                        type="number" name="stock" :value="old('stock', $product->stock)" required />
                                    <x-input-error :messages="$errors->get('stock')" class="mt-1" />
                                </div>

                                <!-- Weight -->
                                <div>
                                    <x-input-label for="weight" value="Berat (Gram)"
                                        class="text-[10px] uppercase tracking-widest mb-1.5" />
                                    <x-text-input id="weight"
                                        class="block w-full px-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white transition-all"
                                        type="number" name="weight" :value="old('weight', $product->weight)" required />
                                    <x-input-error :messages="$errors->get('weight')" class="mt-1" />
                                </div>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" value="Harga (Rp)"
                                class="text-[10px] uppercase tracking-widest mb-1.5" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-slate-400 font-bold sm:text-sm">Rp</span>
                                </div>
                                <x-text-input id="price"
                                    class="block w-full pl-12 pr-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white transition-all font-bold text-lg"
                                    type="number" name="price" :value="old('price', $product->price)" required />
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-1" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" value="Deskripsi Produk"
                                class="text-[10px] uppercase tracking-widest mb-1.5" />
                            <textarea id="description" name="description"
                                class="block w-full px-4 py-3 text-sm rounded-xl bg-slate-50 border-transparent focus:bg-white focus:border-primary focus:ring-primary transition-all shadow-sm"
                                rows="4">{{ old('description', $product->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-1" />
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-4 bg-primary text-white font-black rounded-xl shadow-lg shadow-primary/30 hover:bg-primary-dark transition-all active:scale-95 text-sm uppercase tracking-widest">
                                Perbarui Produk &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImages(input) {
            const container = document.getElementById('imagePreviewContainer');
            if (input.files) {
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const div = document.createElement('div');
                        div.className = 'preview-item w-32 h-32 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 relative group';
                        div.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                        `;
                        container.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
</x-app-layout>