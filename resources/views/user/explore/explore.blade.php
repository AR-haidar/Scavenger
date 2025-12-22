@extends('user.layouts.app')

@section('content')
<div class="py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Explore Sampah
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Kenali jenis-jenis sampah dan pelajari cara memilahnya dengan tepat
            </p>
        </div>

        {{-- Search Box --}}
        <div class="w-full mb-10">

            <form action="#" method="GET" class="relative w-full">

        
                <div class="flex items-center w-full h-12 border-0 border-gray-800 bg-[#FCFCFA] overflow-hidden transition-all duration-300 rounded-full
                    focus-within:border-[#4DB6AC]
                    focus-within:shadow-[0_0_30px_5px_rgba(77,182,172,0.3)]">

                    <input
                        type="text"
                        name="query"
                        class="flex-grow w-full h-full px-6 bg-transparent border-none outline-none focus:ring-0 text-gray-700 placeholder-gray-400 text-base"
                        placeholder="Ketik nama sampahmu..."
                        autocomplete="off"
                    />

                    <div class="flex bg-transparent items-center pr-1 gap-2">

                        <button type="button" class="p-2 text-[#4DB6AC] hover:text-teal-600 transition-colors" title="Scan Gambar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path d="M4 4h4v2H4v4H2V4a2 2 0 0 1 2-2h4v2H4zm16 0h-4v-2h4a2 2 0 0 1 2 2v6h-2V4zM4 20h4v2H4a2 2 0 0 1-2-2v-6h2v6zm16 0v-6h2v6a2 2 0 0 1-2 2h-4v-2h4zM8 11h8v2H8z"/>
                            </svg>
                        </button>

                        <button type="submit" class="flex items-center justify-center w-10 h-10 bg-[#4DB6AC] hover:bg-[#3d968d] text-white rounded-full transition-colors duration-300 m-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>

                    </div>

                </div>
            </form>

        </div>
        {{-- Search Box END END --}}

        <!-- Grid Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            
            <!-- Card Item 1 -->
                <a href="#" class="group bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="aspect-[4/3] bg-gray-100 dark:bg-gray-700 overflow-hidden">
                        <img src="{{ asset('assets/trash/Kulit Jeruk.png') }}" alt="Kulit Jeruk" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Kulit Jeruk</h3>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100 dark:bg-green-900">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"></path>
                                </svg>
                            </span>
                        </div>
                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 mb-2">
                            Organik
                        </span>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                            Sisa makanan yang mudah terurai secara alami dan dapat dijadikan kompos untuk tanaman
                        </p>
                    </div>
                </a>

            <!-- Card Item 2 -->
            <a href="#" class="group bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="aspect-[4/3] bg-gray-100 dark:bg-gray-700 overflow-hidden">
                    <img src="{{ asset('assets/trash/Botol Plastik.png') }}" alt="Botol Plastik" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Botol Plastik</h3>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900">
                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                    <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 mb-2">
                        Anorganik
                    </span>
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                        Plastik daur ulang dengan kode PET, dapat didaur ulang menjadi berbagai produk baru
                    </p>
                </div>
            </a>

            <!-- Card Item 3 -->
            <a href="#" class="group bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="aspect-[4/3] bg-gray-100 dark:bg-gray-700 overflow-hidden">
                    <img src="{{ asset('assets/trash/Lampu Bohlam.png') }}" alt="Lampu Bohlam" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Lampu Bohlam</h3>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100 dark:bg-red-900">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                    <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 mb-2">
                        B3 (Berbahaya)
                    </span>
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                        Mengandung merkuri yang berbahaya, harus dibuang ke tempat khusus limbah elektronik
                    </p>
                </div>
            </a>

            

        </div>

        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6 sm:p-8 text-center border border-indigo-100 dark:border-gray-600">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-3">
                Ingin tahu jenis sampahmu secara instan?
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-2xl mx-auto">
                Gunakan AI Scanner untuk mengidentifikasi sampah dengan kamera, cepat dan akurat
            </p>
            <a href="#" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Scan Sampah dengan AI
            </a>
        </div>

    </div>
</div>
@endsection
