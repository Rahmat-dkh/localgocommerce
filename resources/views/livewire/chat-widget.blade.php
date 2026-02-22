<div class="fixed bottom-6 right-6 md:bottom-10 md:right-8 z-[2000] flex flex-col items-end"
    x-data="{ isOpen: false, msgInput: '' }" wire:ignore.self>
    <!-- Chat Window -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-90"
        class="w-[calc(100%-2rem)] sm:w-[350px] bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden mb-4 flex flex-col fixed sm:static bottom-20 right-4 sm:bottom-auto sm:right-auto"
        style="height: 450px; max-height: 60vh;">

        <!-- Header -->
        <div class="bg-primary p-4 flex items-center justify-between sticky top-0 z-10 shrink-0">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.477 2 2 6.477 2 12c0 1.821.487 3.53 1.338 5.002L2.5 21.5l4.498-.838A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18c-1.476 0-2.887-.313-4.166-.882l-2.732.509.509-2.732A7.955 7.955 0 014 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-primary">
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-black text-sm">Customer Service</h3>
                    <p class="text-blue-100 text-[10px] font-bold">Online - Membalas Cepat</p>
                </div>
            </div>
            <button @click="isOpen = false" class="text-white/70 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 bg-slate-50 p-4 overflow-y-auto space-y-4">
            @foreach($messages as $msg)
                <div class="flex {{ $msg['type'] === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div
                        class="max-w-[80%] {{ $msg['type'] === 'user' ? 'bg-primary text-white rounded-tr-none' : 'bg-white text-slate-700 shadow-sm border border-slate-100 rounded-tl-none' }} px-4 py-3 rounded-2xl text-sm break-words">
                        <p>{{ $msg['text'] }}</p>

                        @if(isset($msg['isFallback']) && $msg['isFallback'])
                            <div class="mt-3">
                                <a href="https://wa.me/6285712966082" target="_blank"
                                    class="inline-flex items-center gap-2 bg-green-500 text-white px-3 py-2 rounded-xl text-xs font-bold hover:bg-green-600 transition-all shadow-md shadow-green-500/20">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                    </svg>
                                    Hubungi WhatsApp
                                </a>
                            </div>
                        @endif

                        <p
                            class="text-[10px] mt-1 {{ $msg['type'] === 'user' ? 'text-blue-200' : 'text-slate-400' }} text-right">
                            {{ $msg['time'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-white border-t border-slate-100 shrink-0">
            <form @submit.prevent="if(msgInput.trim() !== '') { $wire.sendMessage(msgInput); msgInput = ''; }"
                class="flex gap-2">
                <input x-model="msgInput" type="text" placeholder="Tulis pesan..."
                    class="flex-1 bg-slate-50 border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-xl text-sm px-4 py-3 placeholder-slate-400 transition-all font-medium">
                <button type="submit"
                    class="w-12 h-12 bg-primary text-white rounded-xl flex items-center justify-center hover:bg-primary-dark transition-colors shadow-lg shadow-primary/20">
                    <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Toggle Button -->
    <button @click="isOpen = !isOpen"
        class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-all group relative z-[1001]">
        <span x-show="!isOpen">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2C6.477 2 2 6.477 2 12c0 1.821.487 3.53 1.338 5.002L2.5 21.5l4.498-.838A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18c-1.476 0-2.887-.313-4.166-.882l-2.732.509.509-2.732A7.955 7.955 0 014 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z" />
            </svg>
        </span>
        <span x-show="isOpen" x-cloak>
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
            </svg>
        </span>
    </button>
</div>