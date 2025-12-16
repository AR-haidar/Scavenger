@extends('user.layouts.app')

@section('content')
    <!-- Main Section with Fixed Background -->
    <section class="relative min-h-screen bg-gradient-to-br from-red-50 via-rose-50 to-pink-50 overflow-hidden">

        <!-- Fixed Background Container -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-red-50 via-rose-50 to-pink-50"></div>
        </div>

        <!-- Large Illustration - Desktop Only -->
        <div class="hidden lg:block fixed right-0 top-0 bottom-0 pointer-events-none z-10" style="width: 50vw;">
            <div class="relative h-full flex items-center justify-end pr-0">
                <img src="{{ asset('assets/illustrations/b3.png') }}" alt="Ilustrasi Sampah Organik"
                    class="h-[85vh] w-auto object-contain opacity-30" style="transform: translateX(25%);">
            </div>
        </div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <!-- Page Header -->
            <div class="mb-12 lg:max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <!-- Back Button -->
                    <a href="{{ route('user.home') }}"
                        class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 rounded-full text-sm font-semibold transition-colors shadow-sm border border-gray-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>

                    <!-- Category Badge -->
                    <div
                        class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Kategori: B3 (Berbahaya dan Beracun)
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Sampah <span class="text-red-600">B3</span>
                </h1>
                <p class="text-xl text-gray-700 leading-relaxed">
                    Memahami sampah B3 adalah langkah pertama menuju lingkungan yang lebih sehat dan berkelanjutan.
                </p>
            </div>

            <!-- Cards Column -->
            <div class="space-y-8 lg:max-w-3xl">

                <!-- Card 1: Pengertian -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Pengertian Sampah B3</h2>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-4">
                            <strong>Sampah B3 (Bahan Berbahaya dan Beracun)</strong> adalah jenis sampah yang mengandung zat
                            atau senyawa
                            berbahaya yang dapat menimbulkan risiko serius terhadap kesehatan manusia dan lingkungan. Sampah
                            ini umumnya
                            berasal dari aktivitas rumah tangga, medis, maupun industri.
                        </p>
                        <p>
                            Berbeda dengan sampah organik dan anorganik, sampah B3 <strong>tidak boleh dibuang atau diolah
                                sembarangan</strong>
                            karena dapat mencemari tanah, air, dan udara. Oleh karena itu, sampah B3 harus dikelola secara
                            khusus melalui
                            proses pengumpulan, penyimpanan, dan pengolahan oleh pihak yang berwenang sesuai dengan standar
                            keselamatan.
                        </p>
                    </div>

                </div>

                <!-- Card 2: Contoh -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Contoh Sampah Organik</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Baterai bekas
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Lampu neon / CFL
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Oli kendaraan
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Obat-obatan kedaluwarsa
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cat, thinner, lem
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Parfum atau aerosol spray
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Pembersih lantai & cairan kimia keras
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Serangga spray / pembasmi hama
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Tinta printer & cartridge
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Cara Pengolahan -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            Cara Penanganan <span class="text-red-600">Sampah B3</span>
                        </h2>
                    </div>

                    <div class="space-y-6">
                        <!-- Item 1 -->
                        <div class="relative pl-8 pb-6 border-l-2 border-red-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-red-500 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Pisahkan dari jenis sampah lainnya</h3>
                            <p class="text-gray-700">Jangan dicampur dengan sampah organik maupun anorganik.</p>
                        </div>

                        <!-- Item 2 -->
                        <div class="relative pl-8 pb-6 border-l-2 border-red-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-red-500 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Simpan dalam wadah tertutup rapat</h3>
                            <p class="text-gray-700">Khusus untuk cairan kimia, oli, cat, dan bahan berbahaya lainnya.</p>
                        </div>

                        <!-- Item 3 -->
                        <div class="relative pl-8 pb-6 border-l-2 border-red-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-red-500 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Kumpulkan dalam satu tempat khusus</h3>
                            <p class="text-gray-700">Misalnya baterai, lampu rusak, obat kedaluwarsa.</p>
                        </div>

                        <!-- Item 4 -->
                        <div class="relative pl-8 pb-6 border-l-2 border-red-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-red-500 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Serahkan ke fasilitas resmi</h3>
                            <p class="text-gray-700">
                                TPS B3, bank sampah B3, dinas kebersihan, atau program penjemputan limbah elektronik.
                            </p>
                        </div>

                        <!-- Item 5 -->
                        <div class="relative pl-8 pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-red-500 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Jangan dibakar</h3>
                            <p class="text-gray-700">Pembakaran sampah B3 dapat menghasilkan gas beracun yang berbahaya.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Dampak -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-8 h-8 text-white">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M5 5l14 14" />
                            </svg>

                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Hal yang <span class="text-red-600">Tidak Boleh
                                Dilakukan</span></h2>
                    </div>
                    <div class="grid">
                        <div class="p-6 bg-red-50 rounded-2xl border-2 border-red-100">
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Jangan buang baterai ke sungai</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Jangan membakar plastic spray / aerosol</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Jangan membuang lampu neon sembarangan (mengandung merkuri)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 lg:max-w-3xl">
                <div class="bg-gradient-to-r from-[#57c7bc] to-[#358f86] rounded-3xl p-8 md:p-10 text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-4">Mulai Kelola Sampah B3-mu!</h3>
                    <p class="text-white/90 text-lg mb-6">
                        Dengan mengelola sampah B3 dengan benar, kamu sudah berkontribusi nyata untuk lingkungan yang
                        lebih baik.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/classify"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#4DB6AC] rounded-xl font-bold hover:bg-gray-100 transition-colors">
                            Klasifikasi Sampah
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="{{ route('user.home') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-transparent border-2 border-white text-white rounded-xl font-bold hover:bg-white/10 transition-colors">
                            Jelajahi Kategori Lain
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
