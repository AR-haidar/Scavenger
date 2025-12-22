<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/scavengerLogo-sm.png') }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('assets/scavengerLogo-sm.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

                /* Tambahkan ini di dalam <style> */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); } /* Bergerak ke atas 15px */
            100% { transform: translateY(0px); }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite; /* Durasi 4 detik, loop selamanya */
        }

        .custom-shape-divider-bottom-1765790904 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1765790904 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 90px;
        }

        .custom-shape-divider-bottom-1765790904 .shape-fill {
            fill: #F3F4F6;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        {{-- NAVIGATION BAR --}}
        <nav x-data="{ open: false }"
            class="sticky top-0 z-50 shadow-lg bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center" data-aos="fade-down" data-aos-duration="800">
                            <a href="{{ url('/') }}">
                                <x-application-logo class="block h-9 w-auto" />
                            </a>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('user.home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('user.sampah.index')">
                                {{ __('Explore') }}
                            </x-nav-link>
                            <x-nav-link :href="route('user.quiz.index')">
                                {{ __('Quiz') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6 gap-2" data-aos="fade-down" data-aos-delay="200" data-aos-duration="800">
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-[#4DB6AC] focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-3 py-2  bg-white  border-2 border-gray-800  rounded-md  font-extrabold text-xs uppercase tracking-widest text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-[#4DB6AC] focus:ring-offset-2 transition ease-in-out duration-150">
                            Sign Up
                        </a>
                    </div>

                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('user.home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.sampah.index')">
                        {{ __('Explore') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.quiz.index')">
                        {{ __('Quiz') }}
                    </x-responsive-nav-link>
                </div>

                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                            @auth{{ Auth::user()->name }}@endauth
                        </div>
                        <div class="font-medium text-sm text-gray-500">@auth{{ Auth::user()->email }}@endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        @if (isset($header))
            <header class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </header>
        @endif

        <main>
            <section class="bg-[#4DB6AC]">
                <div
                    class="min-h-screen max-w-7xl mx-auto px-6 py-16 md:py-0 grid grid-cols-1 md:grid-cols-2 items-center gap-12">

                    <div class="text-white text-center md:text-left" data-aos="fade-right" data-aos-duration="1000">
                        <h1
                            class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight max-w-xl mx-auto md:mx-0">
                            Kenali Sampahmu,
                            <br class="hidden sm:block">
                            Selamatkan Bumi
                        </h1>

                        <p class="mt-5 text-base sm:text-lg text-white/90 max-w-md mx-auto md:mx-0" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                            Platform edukasi pemilahan sampah berbasis kecerdasan buatan (AI)
                            untuk membantu kamu mengenali, memilah, dan mengelola sampah dengan benar.
                        </p>

                        <div class="mt-8 flex justify-center md:justify-start" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            <a href="/home"
                                class="inline-flex items-center px-7 py-3 bg-black text-white rounded-xl text-sm sm:text-base font-semibold hover:bg-gray-900 transition hover:scale-105 transform duration-300">
                                Coba Sekarang
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-center md:justify-end" data-aos="fade-left" data-aos-duration="1000">
                        <img src="{{ asset('/assets/landingPageCharacter.png') }}" alt="Ilustrasi Edukasi Sampah"
                            class="w-64 sm:w-80 md:w-[420px] object-contain drop-shadow-2xl animate-float">
                            </div>

                </div>
            </section>
            <section class="relative">
                <div class="custom-shape-divider-bottom-1765790904">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                        preserveAspectRatio="none">
                        <path
                            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                            opacity=".25" class="shape-fill"></path>
                        <path
                            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                            opacity=".5" class="shape-fill"></path>
                        <path
                            d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                            class="shape-fill"></path>
                    </svg>
                </div>
            </section>

            <section class="py-20 bg-gray-100">
                <div class="max-w-7xl mx-auto px-6">

                    <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                            Belajar Memilah Sampah <br class="hidden sm:block">
                            <span class="text-[#4DB6AC]">Semudah 1-2-3</span>
                        </h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Mulai perjalanan edukasi lingkunganmu dengan fitur-fitur interaktif yang dirancang khusus
                            untuk memudahkan pembelajaran
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">

                        <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-[#4DB6AC]"
                             data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#4DB6AC] to-[#26A69A] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                    </svg>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Pindai dan Kenali</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Dapatkan info instan mengenai jenis sampah dengan teknologi AI. Cukup upload foto
                                    atau ketik nama sampah, sistem kami akan memberikan klasifikasi lengkap beserta cara
                                    penanganannya.
                                </p>

                                <div
                                    class="mt-6 text-[#4DB6AC] font-semibold flex items-center group-hover:gap-2 transition-all">
                                    Coba Sekarang
                                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-[#4DB6AC]"
                             data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#26A69A] to-[#00897B] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Eksplorasi Informasi</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Kenali jenis-jenis sampah dari kategori organik, anorganik, hingga B3. Pelajari
                                    komposisi, dampak lingkungan, dan potensi daur ulang dari setiap jenis sampah.
                                </p>

                                <div
                                    class="mt-6 text-[#4DB6AC] font-semibold flex items-center group-hover:gap-2 transition-all">
                                    Jelajahi
                                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-[#4DB6AC]"
                             data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#FF7043] to-[#F4511E] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Mainkan Kuis</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Uji pengetahuan kamu tentang pemilahan sampah dengan kuis interaktif. Dapatkan skor,
                                    lihat pembahasannya, dan tantang dirimu untuk menjadi ahli pengelolaan sampah!
                                </p>

                                <div
                                    class="mt-6 text-[#4DB6AC] font-semibold flex items-center group-hover:gap-2 transition-all">
                                    Mulai Kuis
                                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-[#4DB6AC]"
                             data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-[#5C6BC0] to-[#3949AB] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Artikel Edukasi</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Baca puluhan artikel terkini seputar lingkungan, tips pengelolaan sampah, dan kisah
                                    inspiratif. Tingkatkan wawasanmu dengan konten edukatif yang mudah dipahami.
                                </p>

                                <div
                                    class="mt-6 text-[#4DB6AC] font-semibold flex items-center group-hover:gap-2 transition-all">
                                    Baca Artikel
                                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="bg-gray-100 min-h-screen flex items-center px-6 py-16 lg:px-24">
                <div class="w-full max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                    <div class="max-w-xl" data-aos="fade-right" data-aos-duration="1000">
                        <span
                            class="inline-block mb-4 px-4 py-1 text-sm font-semibold rounded-full bg-gray-900 text-white">
                            Mini Quiz Edukasi
                        </span>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                            Jadikan belajar<br />
                            <span class="text-[#4DB6AC]">lebih seru</span> <span class="text-5xl">🚀</span>
                        </h1>

                        <p class="mt-6 text-base sm:text-lg text-gray-600 leading-relaxed">
                            Uji pengetahuanmu tentang persampahan lewat mini-quiz seru! Jawab pertanyaan sederhana dan
                            lihat seberapa jago kamu memilah sampah.
                        </p>

                        <div class="mt-10 flex flex-wrap gap-4">
                            <a href="#"
                                class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition hover:scale-105 transform duration-300">
                                Mulai Quiz
                            </a>
                        </div>
                    </div>

                    <div class="relative flex justify-center lg:justify-end" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="relative">
                            <div class="absolute -inset-6 rounded-full bg-[#4DB6AC]/20 blur-2xl animate-pulse"></div>

                            <img src="{{ asset('assets/piala-landing-page.png') }}"
                                alt="Ilustrasi piala dan elemen reward"
                                class="relative w-72 sm:w-80 lg:w-96 drop-shadow-xl hover:rotate-3 transition duration-500" />
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <footer class="bg-black bg-opacity-90" data-aos="fade-up" data-aos-offset="0">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">

                <div class="flex items-center justify-center gap-2 w-full">
                    <img src="{{ asset('assets/scavengerLogo-footer.svg') }}" alt="Logo" class="h-6 w-auto">
                    <span class="text-sm text-gray-400">
                        © {{ date('Y') }} All Rights Reserved
                    </span>
                </div>

            </div>
        </footer>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, 
            offset: 50, 
            duration: 800, 
            easing: 'ease-out-cubic', 
        });
    </script>
</body>

</html>