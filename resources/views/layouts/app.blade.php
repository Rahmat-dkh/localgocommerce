<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'LocalGo') }} - Marketplace Kuliner Nusantara</title>
    <meta name="description"
        content="@yield('meta_description', $description ?? 'LocalGo - Platform e-commerce terpercaya untuk kuliner khas dan makanan lokal Indonesia. Nikmati kelezatan Nusantara langsung di rumah Anda.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'Kuliner Nusantara, makanan lokal, oleh-oleh Indonesia, jajanan pasar, LocalGo')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_lokarasa.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_lokarasa.png') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? config('app.name', 'LocalGo') }} - Marketplace Kuliner Nusantara">
    <meta property="og:description"
        content="{{ $description ?? 'Platform e-commerce terpercaya untuk kuliner khas dan makanan lokal Indonesia' }}">
    <meta property="og:image" content="{{ asset('images/logo_lokarasa.png') }}">
    <meta property="og:site_name" content="LocalGo">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? config('app.name', 'LocalGo') }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'Platform e-commerce terpercaya untuk kuliner khas dan makanan lokal Indonesia' }}">
    <meta name="twitter:image" content="{{ asset('images/logo_lokarasa.png') }}">

    <!-- Structured Data for Organization & Logo -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "LocalGo",
        "url": "{{ config('app.url') }}",
        "logo": "{{ asset('images/logo_lokarasa.png') }}",
        "description": "Platform e-commerce terpercaya untuk kuliner khas dan makanan lokal Indonesia",
        "sameAs": [
            "https://github.com/Rahmat-dkh/localgocommerce"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-857-1296-6082",
            "contactType": "Customer Service",
            "email": "localgocommerce@gmail.com"
        }
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased text-neutral-dark bg-neutral-light">
    <div class="min-h-screen" x-data="{ open: false, openMobileSearch: false }">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="pt-8 md:pt-0">
            {{ $slot }}
        </main>

        @include('layouts.footer')

        <!-- Global Components -->
        <livewire:cart-panel />
        <livewire:wishlist-panel />

        <!-- Chat Widget Global -->
        <livewire:chat-widget />
    </div>

    @livewireScripts
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>

    <!-- Back to Top Button -->
    <button x-data="{ 
            showScrollTop: false,
            scrollPercent: 0,
            updateScroll() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                this.showScrollTop = scrollTop > 300;
                this.scrollPercent = scrollHeight > 0 ? Math.round((scrollTop / scrollHeight) * 100) : 0;
            },
            scrollToTop() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }" x-init="updateScroll()" @scroll.window="updateScroll()" @click="scrollToTop()" x-show="showScrollTop"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-90"
        class="hidden md:block fixed md:bottom-28 md:right-8 z-[1000] group" aria-label="Back to Top" x-cloak>

        <div
            class="relative w-10 h-10 flex items-center justify-center bg-transparent backdrop-blur-md rounded-full shadow-xl transition-all duration-500 group-hover:-translate-y-1.5 group-hover:scale-105">
            <!-- Progress Circle -->
            <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="46" fill="none" class="stroke-slate-200/20" stroke-width="4" />
                <circle cx="50" cy="50" r="46" fill="none" class="stroke-primary" stroke-width="5"
                    stroke-linecap="round" stroke-dasharray="289"
                    :stroke-dashoffset="289 - (289 * scrollPercent / 100)" />
            </svg>

            <!-- Arrow Icon -->
            <svg class="w-5 h-5 text-primary relative z-10 transition-transform duration-300 group-hover:-translate-y-0.5"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path>
            </svg>
        </div>
    </button>
    @stack('scripts')
</body>

</html>