<div>
    <button onclick="window.dispatchEvent(new CustomEvent('open-wishlist-panel'))" type="button"
        class="relative text-white hover:text-cyan-400 hover:bg-white/10 rounded-full transition-all duration-300 active:scale-95 cursor-pointer"
        style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;">
        <svg fill="{{ $count > 0 ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"
            style="width: 25px; height: 25px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
            </path>
        </svg>
        @if($count > 0)
            <span
                class="absolute top-2 right-2 bg-red-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full shadow-lg border-2 border-primary min-w-[1.2rem] text-center">
                {{ $count }}
            </span>
        @endif
    </button>
</div>