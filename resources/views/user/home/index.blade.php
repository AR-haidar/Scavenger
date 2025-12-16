@extends('user.layouts.app')

@section('content')
    <!-- Waste Categories Section -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                    Kenali <span class="text-[#4DB6AC]">Sampahmu</span>
                </h2>
                <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                    Pahami perbedaan jenis sampah dan cara penanganan yang tepat untuk setiap kategori
                </p>
            </div>

            <!-- Cards Container -->
            <div class="space-y-6">

                <!-- Card 1: Organik -->
                <a href="{{ route('user.sampah-kategori','organik') }}" class="block">
                    <div
                        class="group relative bg-gradient-to-br from-[#57c7bc] to-[#358f86] rounded-2xl shadow-lg hover:shadow-2xl hover:shadow-[#4DB6AC] transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-[#4DB6AC]">
                        <div
                            class="flex flex-col md:flex-row items-center group-hover:scale-[0.98] transition-transform duration-300">
                            <!-- Content Left -->
                            <div class="flex-1 p-8 md:p-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-8 h-8 text-[#4DB6AC]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-4xl font-bold text-white">Sampah Organik</h3>
                                </div>
                                <p class="text-gray-100 text-lg leading-relaxed mb-6 max-w-lg">
                                    Sampah yang mudah terurai secara alami oleh mikroorganisme. Berasal dari sisa makhluk
                                    hidup
                                    seperti sisa makanan, daun, dan ranting. Dapat diolah menjadi kompos untuk pupuk
                                    tanaman.
                                </p>
                            </div>

                            <!-- Illustration Right -->
                            <div class="w-full md:w-72 lg:w-80 h-64 md:h-full flex items-center justify-center mr-20">
                                <img src="{{ asset('assets/illustrations/organik.png') }}" alt="Sampah Organik"
                                    class="w-full h-full object-contain drop-shadow-lg group-hover:scale-150 transition-transform duration-300 scale-[1.7]">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 2: Anorganik -->
                <a href="{{ route('user.sampah-kategori','anorganik') }}" class="block">
                    <div
                        class="group relative bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl shadow-lg hover:shadow-2xl hover:shadow-blue-400 transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-blue-200">
                        <div
                            class="flex flex-col md:flex-row items-center group-hover:scale-[0.98] transition-transform duration-300">
                            <!-- Content Left -->
                            <div class="flex-1 p-8 md:p-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                    <h3 class="text-4xl font-bold text-white">Sampah Anorganik</h3>
                                </div>
                                <p class="text-gray-100 text-lg leading-relaxed mb-6 max-w-lg">
                                    Sampah yang sulit terurai secara alami dan membutuhkan waktu lama untuk hancur.
                                    Contohnya
                                    plastik, kaca, logam, dan kertas. Sebagian besar dapat didaur ulang menjadi produk baru
                                    yang
                                    bermanfaat.
                                </p>
                            </div>

                            <!-- Illustration Right -->
                            <div class="w-full md:w-72 lg:w-80 h-64 md:h-full flex items-center justify-center mr-20">
                                <img src="{{ asset('assets/illustrations/anorganik.png') }}" alt="Sampah Anorganik"
                                    class="w-full h-full object-contain drop-shadow-lg group-hover:scale-125 transition-transform duration-300 scale-[1.4]">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 3: B3 -->
                <a href="{{ route('user.sampah-kategori','b3') }}" class="block">
                    <div
                        class="group relative bg-gradient-to-br from-red-400 to-red-600 rounded-2xl shadow-lg hover:shadow-2xl hover:shadow-red-400 transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-red-200">
                        <div
                            class="flex flex-col md:flex-row items-center group-hover:scale-[0.98] transition-transform duration-300">
                            <!-- Content Left -->
                            <div class="flex-1 p-8 md:p-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-3xl font-bold text-white">Sampah B3</h3>
                                </div>
                                <p class="text-gray-100 text-lg leading-relaxed mb-6 max-w-lg">
                                    Bahan Berbahaya dan Beracun yang mengandung zat kimia berbahaya bagi kesehatan dan
                                    lingkungan. Contohnya baterai, lampu, limbah elektronik, dan obat kedaluwarsa. Harus
                                    dikelola dengan cara khusus oleh pihak berwenang.
                                </p>
                            </div>

                            <!-- Illustration Right -->
                            <div class="w-full md:w-72 lg:w-80 h-64 md:h-full flex items-center justify-center mr-20">
                                <img src="{{ asset('assets/illustrations/b3.png') }}" alt="Sampah B3"
                                    class="w-full h-full object-contain drop-shadow-lg group-hover:scale-125 transition-transform duration-300 scale-[1.3]">
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Bottom CTA -->
            <div class="mt-12 text-center">
                <a href="/waste"
                    class="inline-flex items-center px-8 py-4 bg-[#4DB6AC] text-white text-lg font-bold rounded-xl hover:bg-[#26A69A] transition-all shadow-lg hover:shadow-xl">
                    Jelajahi Semua Jenis Sampah
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

        </div>
    </section>
@endsection
