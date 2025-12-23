@extends('user.layouts.app')

@section('content')
    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- AI Scanner button --}}
            <div
                class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-8 sm:p-8 text-center border border-indigo-100 dark:border-gray-600 shadow mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-3">
                    Ingin tahu jenis sampahmu secara instan?
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-2xl mx-auto">
                    Gunakan AI Scanner untuk mengidentifikasi sampah dengan kamera, cepat dan akurat
                </p>
                <a href="{{ route('user.sampah.scanner') }}"
                    class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Scan Sampah dengan AI
                </a>
            </div>

            {{-- Search Box --}}
            <div class="w-full mb-10">

                <form action="#" method="GET" class="relative w-full">


                    <div
                        class="flex items-center w-full h-12 border-0 border-gray-800 bg-[#FCFCFA] overflow-hidden transition-all duration-300 rounded-full
                    focus-within:border-[#4DB6AC]
                    focus-within:shadow-[0_0_30px_5px_rgba(77,182,172,0.3)]">

                        <input type="text" name="query"
                            class="flex-grow w-full h-full px-6 bg-transparent border-none outline-none focus:ring-0 text-gray-700 placeholder-gray-400 text-base"
                            placeholder="Ketik nama sampahmu..." autocomplete="off" />

                        <div class="flex bg-transparent items-center pr-1 gap-2">

                            <button type="submit"
                                class="flex items-center justify-center w-10 h-10 bg-[#4DB6AC] hover:bg-[#3d968d] text-white rounded-full transition-colors duration-300 m-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>

                        </div>

                    </div>
                </form>

            </div>
            {{-- Search Box END END --}}

            <!-- Grid Content -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12 max-[639px]:grid-cols-2">


                @foreach ($wastes as $waste)
                    <a href="#"
                        class="group bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="aspect-[4/3] bg-gray-100 dark:bg-gray-700 overflow-hidden">
                            @if ($waste->input_image_path)
                                <img src="{{ asset($waste->input_image_path) }}" alt="{{ $waste->waste_name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                            @endif
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $waste->waste_name }}</h3>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100 dark:bg-green-900">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            @if ($waste->category == 'organik')
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 mb-2">
                                    Organik
                                </span>
                            @elseif($waste->category == 'anorganik')
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 mb-2">
                                    Anorganik
                                </span>
                            @else
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 mb-2">
                                    B3 (Berbahaya)
                                </span>
                            @endif
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                {{ Str::limit($waste->description, 30) }}
                            </p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
