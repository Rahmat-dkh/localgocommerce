<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LocalGo') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_lokarasa.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_lokarasa.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-neutral-dark antialiased bg-slate-50 relative overflow-y-auto overflow-x-hidden">
    <!-- Abstract Shapes Wrapper (Fixed & Clipped to prevent overflow) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-innovation/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
        </div>
    </div>

    <!-- Back to Home Button -->
    <a href="/"
        class="absolute top-4 left-4 z-10 p-2 bg-white/50 backdrop-blur-md border border-white/50 text-slate-500 rounded-lg hover:bg-white hover:text-primary shadow-sm hover:shadow-md transition-all group">
        <svg class="w-5 h-5 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">


        <div
            class="w-[90%] sm:max-w-sm px-6 py-6 bg-white/70 backdrop-blur-xl shadow-2xl shadow-primary/10 border border-white/50 overflow-hidden rounded-[30px] sm:rounded-[40px]">
            {{ $slot }}
        </div>
    </div>
</body>

</html>