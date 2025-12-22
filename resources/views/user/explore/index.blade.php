@extends('user.layouts.app')

@section('content')
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10">
                <a href="{{ route('user.sampah.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 rounded-full text-sm font-semibold transition-colors shadow border border-gray-300 mb-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">AI Waste Scanner</h1>
                <p class="text-lg text-gray-600">Identifikasi jenis sampah dan dapatkan panduan pengelolaan yang tepat</p>
            </div>

            <!-- Main Form Card -->
            <div class="max-w-3xl mx-auto mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <form id="aiForm" class="space-y-6">
                        @csrf

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-base font-semibold text-gray-900 mb-3">
                                Upload Foto Sampah
                            </label>
                            <div class="relative">
                                <input type="file" id="imageInput" name="image" accept="image/*" capture="environment"
                                    class="hidden">
                                <label for="imageInput"
                                    class="block w-full h-56 md:aspect-square sm:aspect-square border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-[#4DB6AC] hover:bg-gray-50 transition-colors overflow-hidden">
                                    <div id="uploadPlaceholder"
                                        class="flex flex-col items-center justify-center w-full h-full">
                                        <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-sm text-gray-600 font-medium">Klik untuk pilih foto</p>
                                        <p class="text-xs text-gray-500 mt-1">atau gunakan kamera</p>
                                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG (Max 5MB)</p>
                                    </div>
                                    <div id="imagePreview" class="hidden w-full h-full">
                                        <img id="previewImg" src="" alt="Preview"
                                            class="w-full h-full object-cover">
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t-2 border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500 font-medium">ATAU</span>
                            </div>
                        </div>

                        <!-- Text Description -->
                        <div>
                            <label for="textInput" class="block text-md font-semibold text-gray-900 mb-3">
                                Deskripsikan Sampah
                            </label>
                            <textarea id="textInput" name="text" rows="4"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#4DB6AC] focus:border-transparent resize-none"
                                placeholder="Contoh: Kulit pisang busuk berwarna coklat"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="btnSubmit"
                            class="w-full flex items-center justify-center px-6 py-3.5 bg-[#4DB6AC] text-white font-semibold rounded-xl hover:bg-[#26A69A] focus:outline-none focus:ring-4 focus:ring-[#4DB6AC]/30 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span id="btnText">Analisis Sekarang</span>
                        </button>

                        <!-- Loading State -->
                        <div id="loadingState" class="hidden text-center py-4">
                            <div class="inline-flex items-center px-4 py-2 bg-blue-50 rounded-full">
                                <svg class="animate-spin h-5 w-5 text-[#4DB6AC] mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Sedang menganalisis...</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

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

                        <!-- Environmental Impact -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Dampak Lingkungan
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resImpact">-</p>
                        </div>

                        <!-- Processing Suggestion -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                Saran Pengolahan
                            </h4>
                            <p class="text-gray-700 leading-relaxed" id="resSuggestion">-</p>
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Image Preview
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('uploadPlaceholder').classList.add('hidden');
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        // Form Submit
        document.getElementById('aiForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const btnSubmit = document.getElementById('btnSubmit');
            const btnText = document.getElementById('btnText');
            const loadingState = document.getElementById('loadingState');
            const resultSection = document.getElementById('resultSection');

            // UI State: Loading
            btnSubmit.disabled = true;
            btnText.textContent = 'Menganalisis...';
            loadingState.classList.remove('hidden');
            resultSection.classList.add('hidden');

            // API Call
            axios.post('{{ route('user.eksplorasi.store') }}', formData, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    const data = response.data.data;

                    // Populate Result
                    document.getElementById('resName').textContent = data.waste_name;
                    document.getElementById('resImpact').textContent = data.environmental_impact;
                    document.getElementById('resSuggestion').textContent = data.processing_suggestion;

                    // Category Badge
                    const badge = document.getElementById('resCategory');
                    badge.textContent = data.category.toUpperCase();
                    badge.className = 'inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold';

                    if (data.category.toLowerCase().includes('organik')) {
                        badge.classList.add('bg-green-100', 'text-green-800');
                    } else if (data.category.toLowerCase().includes('b3')) {
                        badge.classList.add('bg-red-100', 'text-red-800');
                    } else {
                        badge.classList.add('bg-blue-100', 'text-blue-800');
                    }

                    // Show uploaded image if exists
                    const imageInput = document.getElementById('imageInput');
                    if (imageInput.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('resultImage').src = e.target.result;
                            document.getElementById('resultImageContainer').classList.remove('hidden');
                        }
                        reader.readAsDataURL(imageInput.files[0]);
                    }

                    // Show Result
                    resultSection.classList.remove('hidden');
                    resultSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                })
                .catch(function(error) {
                    console.error(error);
                    let msg = "Terjadi kesalahan saat menganalisis.";
                    if (error.response && error.response.data && error.response.data.message) {
                        msg = error.response.data.message;
                    }
                    alert(msg);
                })
                .finally(function() {
                    btnSubmit.disabled = false;
                    btnText.textContent = 'Analisis Sekarang';
                    loadingState.classList.add('hidden');
                });
        });

        // Reset Form
        function resetForm() {
            document.getElementById('aiForm').reset();
            document.getElementById('uploadPlaceholder').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('resultSection').classList.add('hidden');
            document.getElementById('resultImageContainer').classList.add('hidden');
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
@endsection
