<div class="mt-6 space-y-6">
    <!-- Reviews Header -->
    <div class="flex items-center justify-between border-b border-neutral-dark/5 pb-4">
        <div>
            <h2 class="text-xl font-black text-neutral-dark tracking-tighter">Ulasan <span
                    class="text-primary italic">Pelanggan</span></h2>
            <div class="flex items-center gap-2 mt-2">
                <div class="flex text-amber-400">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= round($product->averageRating()) ? 'fill-current' : 'text-neutral-dark/10' }}"
                            viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <span class="text-sm font-bold text-neutral-dark/60">{{ number_format($product->averageRating(), 1) }} /
                    5.0 ({{ $product->reviewCount() }} Ulasan)</span>
            </div>
        </div>

        @auth
            <button wire:click="$toggle('showForm')"
                class="px-6 py-3 bg-primary text-white rounded-2xl font-bold text-sm shadow-lg shadow-primary/20 hover:-translate-y-1 transition-all">
                {{ $showForm ? 'Batal' : 'Tulis Ulasan' }}
            </button>
        @else
            <a href="{{ route('login') }}"
                class="px-6 py-3 bg-neutral-dark/5 text-neutral-dark/60 rounded-2xl font-bold text-sm border border-neutral-dark/10 hover:bg-neutral-dark/10 transition-all">
                Login untuk Mengulas
            </a>
        @endauth
    </div>

    <!-- Review Form -->
    @if($showForm)
        <div class="glass p-6 rounded-3xl border-primary/20 bg-primary/5" data-aos="fade-down">
            <h3 class="text-lg font-black text-neutral-dark mb-6">Berikan Penilaian Anda</h3>
            <form wire:submit.prevent="save" class="space-y-6">
                <div>
                    <label
                        class="block text-xs font-black uppercase text-neutral-dark/40 tracking-widest mb-3">Rating</label>
                    <div class="flex gap-2">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" wire:click="$set('rating', {{ $i }})"
                                class="focus:outline-none transition-transform hover:scale-110">
                                <svg class="w-10 h-10 {{ $i <= $rating ? 'text-amber-400 fill-current' : 'text-neutral-dark/10 fill-none stroke-current stroke-2' }}"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.976-2.888a1 1 0 00-1.175 0l-3.976 2.888c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.49 10.101c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </button>
                        @endfor
                    </div>
                    @error('rating') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label
                        class="block text-xs font-black uppercase text-neutral-dark/40 tracking-widest mb-3">Komentar</label>
                    <textarea wire:model="comment" rows="4"
                        class="w-full bg-white/50 border-neutral-dark/10 rounded-2xl p-4 focus:ring-primary focus:border-primary transition-all text-neutral-dark font-medium"
                        placeholder="Tuliskan pengalaman Anda menggunakan produk ini..."></textarea>
                    @error('comment') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-8 py-4 bg-growth text-white rounded-2xl font-black shadow-xl shadow-growth/20 hover:-translate-y-1 transition-all">
                        Kirim Ulasan Sekarang
                    </button>
                </div>
            </form>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="p-4 bg-growth/10 text-growth border border-growth/20 rounded-2xl font-bold text-center">
            {{ session('message') }}
        </div>
    @endif

    <!-- Review List -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($reviews as $review)
            <div class="glass p-4 rounded-3xl border-white/40 hover:border-primary/20 transition-all group"
                data-aos="fade-up">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-black uppercase shadow-sm text-xs">
                            {{ substr($review->user->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-black text-neutral-dark leading-none">{{ $review->user->name }}</h4>
                            <span
                                class="text-[10px] text-neutral-dark/40 font-bold uppercase tracking-widest">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3 h-3 {{ $i <= $review->rating ? 'fill-current' : 'text-neutral-dark/10' }}"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        @if(auth()->check() && auth()->user()->isAdmin())
                            <button wire:click="deleteReview({{ $review->id }})"
                                wire:confirm="Apakah Anda yakin ingin menghapus ulasan ini?"
                                class="text-red-500 hover:text-red-600 transition-colors p-1" title="Hapus Ulasan">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
                <p class="text-neutral-dark/70 text-sm font-medium leading-relaxed">
                    {{ $review->comment }}
                </p>
            </div>
        @empty
            <div
                class="md:col-span-2 py-8 text-center bg-neutral-dark/5 rounded-[2rem] border border-dashed border-neutral-dark/10">
                <svg class="w-12 h-12 mx-auto text-neutral-dark/10 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-neutral-dark/40 font-bold italic">Belum ada ulasan untuk produk ini.</p>
            </div>
        @endforelse
    </div>
</div>