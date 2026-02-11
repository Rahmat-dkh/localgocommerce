<div>
    <button onclick="window.dispatchEvent(new CustomEvent('open-wishlist-panel'))" type="button"
        class="relative p-1 text-slate-200 hover:text-cyan-400 transition-all duration-300 hover:scale-110 cursor-pointer">
        <svg class="w-5 h-5" fill="{{ $count > 0 ? 'currentColor' : 'none' }}" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
            </path>
        </svg>
        @if($count > 0)
            <span
                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-black rounded-full w-5 h-5 flex items-center justify-center border-2 border-white">
                {{ $count }}
            </span>
        @endif
    </button>
</div>