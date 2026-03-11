<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-3xl font-black text-neutral-dark tracking-tight">Add New Product</h1>
        <p class="text-slate-500 font-medium">Create a new product to add to your catalog.</p>
    </div>

    <div class="max-w-3xl bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Product Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900">
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Category</label>
                    <select name="category_id" required
                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Description</label>
                <textarea name="description" rows="3" required
                    class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-1" />
            </div>

            <!-- Philosophy -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Philosophy</label>
                <textarea name="philosophy" rows="3"
                    class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900"
                    placeholder="Ceritakan sejarah atau filosofi di balik produk ini...">{{ old('philosophy') }}</textarea>
                <x-input-error :messages="$errors->get('philosophy')" class="mt-1" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Price -->
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Price (Rp)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required min="0"
                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900">
                    <x-input-error :messages="$errors->get('price')" class="mt-1" />
                </div>

                <!-- Stock -->
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" required min="0"
                        class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900">
                    <x-input-error :messages="$errors->get('stock')" class="mt-1" />
                </div>
            </div>

            <!-- Whatsapp Number -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Whatsapp Number</label>
                <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required
                    class="w-full px-5 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all font-bold text-slate-900"
                    placeholder="628123456789">
                <p class="text-xs text-slate-400">Format: 628xxxxxxxx (No + or -)</p>
                <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-1" />
            </div>

            <!-- Image URL (Using URL for now as per controller logic seen earlier, or verify if upload is handled) -->
            <!-- Controller in Step 141 had 'image_url' => 'nullable|url'. But DB seeder had 'image' path. -->
            <!-- Let's check Product model fillable. -->
            <!-- Assuming standard file upload is preferred but controller needs update. For now sticking to text input or simple file. -->
            <!-- Let's assume file upload is needed for a "modern" app. I'll add file input but the controller might need a tweak. -->
            <!-- Step 141 controller: 'image_url' => 'nullable|url'. No 'image' file validation. -->
            <!-- I will stick to what the controller expects OR update the controller.
                  The user wants "Clean", file upload is cleaner than URL.
                  I will UPDATE the controller later to handle file uploads properly.
                  For now, I'll put a placeholder for image input. -->

            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Product Image
                    (Main)</label>

                <div class="flex items-start gap-6">
                    <!-- Image Preview -->
                    <div id="main-image-preview"
                        class="w-32 h-32 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl flex items-center justify-center overflow-hidden relative hidden">
                        <img src="" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1">
                        <input type="file" name="image" accept="image/*" id="main-image-input"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer bg-slate-50 rounded-xl">
                        <p class="mt-2 text-xs text-slate-400">Recommended size: 800x800px. Max size: 10MB.</p>
                        <x-input-error :messages="$errors->get('image')" class="mt-1" />
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('main-image-input').addEventListener('change', function (event) {
                    const previewContainer = document.getElementById('main-image-preview');
                    const img = previewContainer.querySelector('img');

                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            img.src = e.target.result;
                            previewContainer.classList.remove('hidden');
                        }
                        reader.readAsDataURL(this.files[0]);
                    } else {
                        previewContainer.classList.add('hidden');
                        img.src = '';
                    }
                });
            </script>

            <!-- Gallery Images -->
            <!-- Gallery Images -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Gallery Images
                    (Optional)</label>
                <div
                    class="p-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl hover:border-primary/50 transition-colors">
                    <input type="file" name="gallery_images[]" multiple accept="image/*" id="gallery-input"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                    <p class="mt-2 text-xs text-slate-400">Hold <strong>Ctrl</strong> (Windows) or <strong>Cmd</strong>
                        (Mac) to select multiple images.</p>
                </div>

                <!-- Image Preview Container -->
                <div id="gallery-preview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 hidden"></div>

                <x-input-error :messages="$errors->get('gallery_images.*')" class="mt-1" />
            </div>

            <script>
                document.getElementById('gallery-input').addEventListener('change', function (event) {
                    const previewContainer = document.getElementById('gallery-preview');
                    previewContainer.innerHTML = '';

                    if (this.files && this.files.length > 0) {
                        previewContainer.classList.remove('hidden');
                        Array.from(this.files).forEach(file => {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const div = document.createElement('div');
                                div.className = 'relative aspect-square rounded-xl overflow-hidden border border-slate-200';

                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.className = 'w-full h-full object-cover';

                                div.appendChild(img);
                                previewContainer.appendChild(div);
                            }
                            reader.readAsDataURL(file);
                        });
                    } else {
                        previewContainer.classList.add('hidden');
                    }
                });
            </script>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products.index') }}"
                    class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-colors">Cancel</a>
                <button type="submit"
                    class="px-8 py-3 bg-primary text-white font-black rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">Create
                    Product</button>
            </div>
        </form>
    </div>
</x-admin-layout>