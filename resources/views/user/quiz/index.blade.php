@extends('user.layouts.app')

@section('content')
    <!-- Waste Categories Section -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                    Mainkan dan Taklukkan<span class="text-[#4DB6AC]"> Sampah</span>
                </h2>
                <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                    Mainkan game seru, kejar waktu, dan buktikan seberapa paham kamu membedakan jenis sampah.
                </p>
            </div>

            <!-- Cards Container -->
            <div class="space-y-6">

                <!-- Card 1: Organik -->
                <a href="{{ route('user.sampah-kategori', 'organik') }}" class="block">
                    <div
                        class="group relative bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl shadow-lg hover:shadow-2xl hover:shadow-amber-400 transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-amber-400">
                        <div
                            class="flex flex-col md:flex-row items-center group-hover:scale-[0.98] transition-transform duration-300">
                            <!-- Content Left -->
                            <div class="flex-1 p-8 md:p-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-8 h-8 text-amber-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6M9 11h6M9 15h3" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 5.25A2.25 2.25 0 016.75 3h10.5A2.25 2.25 0 0119.5 5.25v13.5A2.25 2.25 0 0117.25 21H6.75A2.25 2.25 0 014.5 18.75V5.25z" />
                                            <circle cx="7" cy="7" r="0.75" />
                                            <circle cx="7" cy="11" r="0.75" />
                                            <circle cx="7" cy="15" r="0.75" />
                                        </svg>

                                    </div>
                                    <h3 class="text-4xl font-bold text-white">Quiz</h3>
                                </div>
                                <p class="text-gray-100 text-lg leading-relaxed mb-6 max-w-lg">
                                    Seberapa jago kamu soal sampah? Jawab pertanyaan secepat mungkin sebelum waktunya habis
                                    dan buktikan pengetahuanmu tentang pengelolaan sampah!
                                </p>
                            </div>

                            <!-- Illustration Right -->
                            <div class="w-full md:w-72 lg:w-80 h-64 md:h-full flex items-center justify-center mr-20">
                                <img src="{{ asset('assets/illustrations/quiz.svg') }}" alt="Sampah Organik"
                                    class="w-full h-full object-contain drop-shadow-lg group-hover:scale-90 transition-transform duration-300">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 2: Anorganik -->
                <a href="{{ route('user.game.index') }}" class="block">
                    <div
                        class="group relative bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl shadow-lg hover:shadow-2xl hover:shadow-emerald-400 transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-emerald-200">
                        <div
                            class="flex flex-col md:flex-row items-center group-hover:scale-[0.98] transition-transform duration-300">
                            <!-- Content Left -->
                            <div class="flex-1 p-8 md:p-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-8 h-8 text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 4h4l-.5 2h-3L10 4z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 8l-3 3m0 0l1-2m-1 2l2 1" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 8l3 3m0 0l-1-2m1 2l-2 1" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 14h5v6H4z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 14h5v6h-5z" />
                                        </svg>

                                    </div>
                                    <h3 class="text-4xl font-bold text-white">Pilah</h3>
                                </div>
                                <p class="text-gray-100 text-lg leading-relaxed mb-6 max-w-lg">
                                    Sampah datang satu per satu, tugasmu memilahnya dengan cepat dan tepat! Lawan waktu dan
                                    lihat seberapa jago kamu membedakan jenis-jenis sampah.
                                </p>
                            </div>

                            <!-- Illustration Right -->
                            <div class="w-full md:w-72 lg:w-80 h-64 md:h-full flex items-center justify-center mr-20">
                                <img src="{{ asset('assets/illustrations/pilah.svg') }}" alt="Sampah Anorganik"
                                    class="w-full h-full object-contain drop-shadow-lg group-hover:scale-90 transition-transform duration-300">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

    </section>
@endsection
