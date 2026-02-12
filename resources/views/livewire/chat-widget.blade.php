<div class="fixed bottom-4 right-4 md:bottom-10 md:right-10 z-[1000] flex flex-col items-end"
    x-data="{ isOpen: false, msgInput: '' }" wire:ignore.self>
    <!-- Chat Window -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-90"
        class="w-[90vw] sm:w-[350px] bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden mb-4 flex flex-col fixed sm:static bottom-20 right-4 sm:bottom-auto sm:right-auto"
        style="height: 500px; max-height: 70vh;">

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
        class="w-14 h-14 bg-primary text-white rounded-full flex items-center justify-center shadow-2xl shadow-primary/40 hover:scale-110 active:scale-95 transition-all group relative z-[1001]">
        <span x-show="!isOpen">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
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