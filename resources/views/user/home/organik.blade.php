@extends('user.layouts.app')

@section('content')
    <!-- Main Section with Fixed Background -->
    <section class="relative min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 overflow-hidden">

        <!-- Fixed Background Container -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50"></div>
        </div>

        <!-- Large Illustration - Desktop Only -->
        <div class="hidden lg:block fixed right-0 top-0 bottom-0 pointer-events-none z-10" style="width: 50vw;">
            <div class="relative h-full flex items-center justify-end pr-0">
                <img src="{{ asset('assets/illustrations/organik.png') }}" alt="Ilustrasi Sampah Organik"
                    class="h-[85vh] w-auto object-contain opacity-30" style="transform: translateX(25%);">
            </div>
        </div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <!-- Page Header -->
            <div class="mb-12 lg:max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <!-- Back Button -->
                    <a href="{{ route('user.home') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 rounded-full text-sm font-semibold transition-colors shadow-sm border border-gray-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    
                    <!-- Category Badge -->
                    <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Kategori: Organik
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Sampah <span class="text-green-600">Organik</span>
                </h1>
                <p class="text-xl text-gray-700 leading-relaxed">
                    Memahami sampah organik adalah langkah pertama menuju lingkungan yang lebih sehat dan berkelanjutan.
                </p>
            </div>

            <!-- Cards Column -->
            <div class="space-y-8 lg:max-w-3xl">

                <!-- Card 1: Pengertian -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Pengertian Sampah Organik</h2>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-4">
                            <strong>Sampah organik</strong> adalah jenis sampah yang berasal dari sisa-sisa makhluk hidup,
                            baik tumbuhan maupun hewan. Karakteristik utama sampah organik adalah kemampuannya untuk
                            <strong>terurai secara alami</strong> oleh mikroorganisme dalam waktu relatif singkat.
                        </p>
                        <p>
                            Proses penguraian alami ini menjadikan sampah organik sebagai bahan yang ramah lingkungan jika
                            dikelola dengan baik. Sampah jenis ini dapat dimanfaatkan kembali melalui proses pengomposan
                            untuk menjadi pupuk alami yang menyuburkan tanah.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Contoh -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Contoh Sampah Organik</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-3 flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Dari Dapur
                            </h3>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Sisa makanan dan nasi
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kulit buah dan sayuran
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cangkang telur
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Ampas kopi dan teh
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-3 flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Dari Kebun
                            </h3>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Daun kering dan ranting
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Rumput hasil pangkasan
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Serbuk gergaji kayu
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kotoran hewan ternak
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Cara Pengolahan -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Cara Pengolahan</h2>
                    </div>
                    <div class="space-y-6">
                        <div class="relative pl-8 pb-6 border-l-2 border-green-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                                1
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Pemilahan</h3>
                            <p class="text-gray-700">Pisahkan sampah organik dari sampah anorganik. Pastikan tidak
                                tercampur dengan plastik, kaca, atau logam.</p>
                        </div>
                        <div class="relative pl-8 pb-6 border-l-2 border-green-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                                2
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Pencacahan</h3>
                            <p class="text-gray-700">Potong atau cacah sampah organik menjadi ukuran kecil (2-5 cm) agar
                                proses pengomposan lebih cepat.</p>
                        </div>
                        <div class="relative pl-8 pb-6 border-l-2 border-green-200 last:border-0 last:pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                                3
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Pengomposan</h3>
                            <p class="text-gray-700">Masukkan ke dalam komposter atau tumpuk di lahan. Tambahkan
                                bioaktivator jika perlu. Aduk setiap 3-5 hari sekali.</p>
                        </div>
                        <div class="relative pl-8 pb-0">
                            <div
                                class="absolute left-0 top-0 w-8 h-8 -ml-4 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                                4
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">Pematangan</h3>
                            <p class="text-gray-700">Tunggu 4-6 minggu hingga kompos matang. Ciri kompos matang: berwarna
                                coklat kehitaman, bertekstur gembur, dan berbau tanah.</p>
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
                        <h2 class="text-3xl font-bold text-gray-900">Tips Mengelola di Rumah</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800"><strong>Sediakan tempat khusus</strong> untuk sampah organik di dapur
                                dengan tutup rapat agar tidak berbau.</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800"><strong>Buang setiap hari</strong> ke komposter atau bank sampah untuk
                                menghindari bau dan lalat.</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800"><strong>Kurangi air</strong> pada sampah organik basah sebelum
                                dimasukkan ke komposter.</p>
                        </div>
                        <div class="flex items-start p-4 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-800"><strong>Gunakan komposter sederhana</strong> seperti lubang biopori
                                atau tong bekas yang dilubangi.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Dampak -->
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Dampak Positif & Negatif</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="p-6 bg-green-50 rounded-2xl border-2 border-green-100">
                            <h3 class="font-bold text-xl text-green-800 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Dampak Positif
                            </h3>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <span class="text-green-500 mr-2">✓</span>
                                    <span>Mengurangi volume sampah di TPA</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-green-500 mr-2">✓</span>
                                    <span>Menghasilkan pupuk organik berkualitas</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-green-500 mr-2">✓</span>
                                    <span>Memperbaiki struktur tanah</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-green-500 mr-2">✓</span>
                                    <span>Mengurangi emisi gas metana</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-green-500 mr-2">✓</span>
                                    <span>Menghemat biaya pembelian pupuk</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-6 bg-red-50 rounded-2xl border-2 border-red-100">
                            <h3 class="font-bold text-xl text-red-800 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                Dampak Negatif (Jika Tidak Dikelola)
                            </h3>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menimbulkan bau busuk</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menjadi sarang lalat dan kecoa</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Mencemari air tanah</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Menghasilkan gas metana (gas rumah kaca)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-red-500 mr-2">✗</span>
                                    <span>Mengurangi estetika lingkungan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 lg:max-w-3xl">
                <div class="bg-gradient-to-r from-[#57c7bc] to-[#358f86] rounded-3xl p-8 md:p-10 text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-4">Mulai Kelola Sampah Organikmu!</h3>
                    <p class="text-white/90 text-lg mb-6">
                        Dengan mengelola sampah organik dengan benar, kamu sudah berkontribusi nyata untuk lingkungan yang
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
