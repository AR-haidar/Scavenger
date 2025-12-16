@extends('user.layouts.app')

@section('content')
    <!-- Main Section with Fixed Background -->
    <section class="relative min-h-screen bg-gradient-to-br from-blue-100 via-sky-100 to-cyan-100 overflow-hidden">

        <!-- Fixed Background Container -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-100 via-sky-100 to-cyan-100"></div>
        </div>

        <!-- Large Illustration - Desktop Only -->
        <div class="hidden lg:block fixed right-0 top-0 bottom-0 pointer-events-none z-10" style="width: 50vw;">
            <div class="relative h-full flex items-center justify-end pr-0">
                <img src="{{ asset('assets/illustrations/anorganik.png') }}" alt="Ilustrasi Sampah Organik"
                    class="h-[100vh] w-auto object-contain opacity-50" style="transform: translateX(25%);">
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
                        class="inline-flex items-center px-4 py-2 bg-blue-200 text-blue-800 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Kategori: Anorganik
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Sampah <span class="text-blue-600">Anorganik</span>
                </h1>
                <p class="text-xl text-gray-700 leading-relaxed">
                    Memahami sampah anorganik adalah langkah pertama menuju lingkungan yang lebih sehat dan berkelanjutan.
                </p>
            </div>

            <!-- Cards Column -->
            <div class="space-y-8 lg:max-w-3xl">

                <!-- Card 1: Pengertian -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Pengertian Sampah Anorganik</h2>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-4">
                            <strong>Sampah anorganik</strong> adalah jenis sampah yang berasal dari bahan non-hayati atau
                            hasil proses industri
                            yang tidak berasal langsung dari makhluk hidup. Sampah ini memiliki karakteristik utama berupa
                            <strong>sulit terurai secara alami</strong> dan membutuhkan waktu sangat lama untuk hancur di
                            lingkungan.
                        </p>
                        <p>
                            Karena sifatnya yang tidak mudah terurai, sampah anorganik berpotensi menimbulkan pencemaran
                            lingkungan jika
                            tidak dikelola dengan benar. Namun, banyak jenis sampah anorganik seperti plastik, kaca, logam,
                            dan kertas
                            dapat <strong>didaur ulang</strong> dan dimanfaatkan kembali menjadi produk baru yang memiliki
                            nilai guna.
                        </p>

                    </div>
                </div>

                <!-- Card 2: Contoh -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Contoh Sampah Anorganik</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Plastik (botol, gelas, sedotan, kantong belanja)
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Styrofoam
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kaca (botol, gelas pecah)
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kaleng dan logam (minuman, cat)
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Aluminium foil
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Karet
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kemasan mie instan, snack, dan sachet
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    CD/DVD
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Polybag
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kabel atau elektronik kecil
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Cara Pengolahan -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Cara Pengolahan</h2>
                    </div>
                    <div class="space-y-6">
                        <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Daur Ulang</h3>
                            <p class="text-gray-700">Plastik, kaca, dan logam bisa diolah kembali menjadi produk baru.</p>
                        </div>
                        <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Eco-Bricks</h3>
                            <p class="text-gray-700">Botol plastik diisi padat dengan sampah plastik kecil → digunakan
                                untuk konstruksi.</p>
                        </div>
                        <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Bank Sampah</h3>
                            <p class="text-gray-700">Sampah anorganik disetor untuk dijual dan ditimbang untuk mendapatkan
                                poin/uang.</p>
                        </div>
                        <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Upcycling</h3>
                            <p class="text-gray-700">Mengubah barang bekas menjadi produk </p>
                        </div>
                        <div class="relative pl-8 pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                    width="18" height="18">
                                    <path d="M5 12h12" />
                                    <path d="M13 6l6 6-6 6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Tempat Daur Ulang Elektronik</h3>
                            <p class="text-gray-700">Untuk kabel, charger, earphone rusak.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Tips -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Fakta Menarik</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800">Plastik membutuhkan 450–1000 tahun untuk terurai</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800">1 botol plastik bisa diubah menjadi serat pakaian atau karpet</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800">Indonesia termasuk penyumbang sampah plastik laut terbesar ke-2</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800">Setiap orang rata-rata menghasilkan 1–2 kg sampah/hari</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800">Styrofoam hampir TIDAK bisa terurai sama sekali</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Dampak -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-8 h-8 text-white">
                                <path d="M12 3l9 16H3l9-16z" />
                                <path d="M12 9v4" />
                                <path d="M12 17h.01" />
                            </svg>

                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Jika Sampah Anorganik tidak dikelola</h2>
                    </div>
                    <div class="grid">
                        <div class="p-6 bg-red-50 rounded-2xl border-2 border-red-100">
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menyumbat got dan menyebabkan banjir</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menyebabkan hewan laut menelan plastik → mati kelaparan</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Membawa bahan kimia berbahaya ke tanah dan air</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Memenuhi TPA hingga menumpuk puluhan meter</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menghasilkan mikroplastik yang masuk ke rantai makanan manusia</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 lg:max-w-3xl">
                <div class="bg-gradient-to-r from-[#57c7bc] to-[#358f86] rounded-3xl p-8 md:p-10 text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-4">Mulai Kelola Sampah Anorganikmu!</h3>
                    <p class="text-white/90 text-lg mb-6">
                        Dengan mengelola sampah anorganik dengan benar, kamu sudah berkontribusi nyata untuk lingkungan yang
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
