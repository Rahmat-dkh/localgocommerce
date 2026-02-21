<x-admin-layout>
    <div class="mb-4 md:mb-8 flex justify-between items-center gap-4">
        <div>
            <h1 class="text-xl md:text-3xl font-black text-neutral-dark tracking-tight">Products</h1>
            <p class="text-xs md:text-sm text-slate-500 font-medium">Manage your product inventory.</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
            class="px-4 md:px-6 py-2.5 md:py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20 text-xs md:text-sm whitespace-nowrap">
            + Add New
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-2xl font-bold border border-green-100">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-left text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-wider">
                            Product</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-left text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-wider">
                            Category</th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-left text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-wider">
                            Price
                        </th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-left text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-wider">
                            Stock
                        </th>
                        <th
                            class="px-3 md:px-6 py-3 md:py-4 text-right text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-3 md:px-6 py-3 md:py-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 md:h-12 md:w-12 flex-shrink-0 bg-slate-100 rounded-lg overflow-hidden border border-slate-100">
                                        @if($product->image)
                                            <img class="h-full w-full object-cover" src="{{ asset($product->image) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-slate-400">
                                                <svg class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-3 md:ml-4">
                                        <div class="text-xs md:text-sm font-bold text-slate-900 leading-tight">
                                            {{ $product->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-0.5 md:py-1 inline-flex text-[10px] md:text-xs leading-5 font-bold rounded-lg bg-slate-100 text-slate-600">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td
                                class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-bold text-slate-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td
                                class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-[10px] md:text-sm text-slate-500 font-medium text-center md:text-left">
                                {{ $product->stock }}
                            </td>
                            <td
                                class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-right text-xs md:text-sm font-medium">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-primary hover:text-primary-dark font-bold mr-2 md:mr-3">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Del</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500 font-medium">
                                No products found. <a href="{{ route('admin.products.create') }}"
                                    class="text-primary hover:underline">Add one now</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>
</x-admin-layout>