@extends('user.layouts.app')

@section('content')
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Result Section (Hidden by default) -->
            <div id="resultSection" class="hidden max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

                    <!-- Result Header -->
                    <div class="bg-gradient-to-r from-[#4DB6AC] to-[#26A69A] px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Hasil Analisis</h2>
                    </div>

                    <!-- Result Content -->
                    <div class="p-8 space-y-6">

                        <!-- Uploaded Image (if exists) -->
                        <div id="resultImageContainer" class="hidden">
                            <div
                                class="w-full h-56 md:aspect-square sm:aspect-square overflow-hidden rounded-xl bg-gray-100">
                                <img id="resultImage" src="" alt="Sampah" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Waste Name -->
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900" id="resName">-</h3>
                        </div>

                        <!-- Category Badge -->
                        <div>
                            <span class="text-sm font-medium text-gray-500">Kategori</span>
                            <div class="mt-2">
                                <span id="resCategory"
                                    class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold">
                                    -
                                </span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Deskripsi
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resDescription">-</p>
                        </div>

                        <!-- Composition -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Komposisi
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resComposition">-</p>
                        </div>

                        <!-- Handling -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Penanganan
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resHandling">-</p>
                        </div>

                        <!-- Recycling -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Daur Ulang
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resRecycling">-</p>
                        </div>

                        <!-- Impact -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                Dampak Lingkungan
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resImpact">-</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 flex flex-col sm:flex-row gap-3">
                            <button onclick="resetForm()"
                                class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                                Analisis Lagi
                            </button>
                            <a href="{{ route('user.sampah.index') }}"
                                class="flex-1 px-6 py-3 bg-[#4DB6AC] text-white font-semibold rounded-xl hover:bg-[#26A69A] transition-colors text-center">
                                Jelajahi Kategori
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
