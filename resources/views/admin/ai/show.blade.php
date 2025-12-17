<x-app-layout>
    <x-slot name="header">
        <div
            class="flex justify-between items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-4">
            <div>
                <x-breadcrumb :items="[['label' => 'Klasifikasi AI', 'url' => route('admin.ai.index')], ['label' => 'Detail']]" />

                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    {{ __('Detail Klasifikasi AI') }}
                </h2>
                <span class="text-sm text-gray-400">
                    Informasi lengkap hasil klasifikasi AI
                </span>
            </div>
            <a href="{{ route('admin.ai.index') }}"
                class="inline-flex items-center px-3 py-1.5 border border-gray-400 text-gray-500 text-sm rounded hover:bg-gray-300 hover:text-white hover:border-none transition font-extrabold">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                KEMBALI
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- IMAGE -->
                <div>
                    <div class="">
                        @if ($data->input_type == 'image')
                            <img src="{{ asset($data->input_image_path) }}" alt="{{ $data->input_waste_name }}"
                                class="w-full aspect-square object-cover rounded-lg border border-gray-300"
                                alt="">
                        @else
                            <div
                                class="w-full aspect-square flex items-center justify-center rounded-lg border border-dashed border-gray-300 text-gray-400">
                                Input : {{ $data->input_text }}
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col text-sm text-gray-400 space-y-1 mt-2">
                        <div class="flex items-center gap-1.5 text-gray-800">
                            <span>
                                Input dari: <strong>{{ $data->user->name }}</strong>
                            </span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <!-- ICON CLOCK -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span>
                                Dibuat: {{ $data->created_at->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <div class="flex items-center gap-1.5">
                            <!-- ICON REFRESH -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4v6h6M20 20v-6h-6M20 8a8 8 0 00-14.9-2M4 16a8 8 0 0014.9 2" />
                            </svg>

                            <span>
                                Diperbarui: {{ $data->updated_at->translatedFormat('d F Y') }}
                            </span>
                        </div>

                    </div>
                </div>

                <!-- DETAIL -->
                <div class="lg:col-span-2 space-y-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-1">{{ $data->waste_name }}</h3>

                    <!-- NAME & CATEGORY -->
                    <div>
                        @if ($data->category == 'organik')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                {{ strtoupper($data->category) }}
                            </span>
                        @elseif ($data->category == 'anorganik')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                                {{ strtoupper($data->category) }}
                            </span>
                        @elseif ($data->category == 'b3')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                {{ strtoupper($data->category) }}
                            </span>
                        @endif
                    </div>

                    <!-- DESCRIPTION -->
                    @if ($data->processing_suggestion)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-1">Saran Pengolahan</h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $data->processing_suggestion }}
                            </p>
                        </div>
                    @endif
                    @if ($data->environmental_impact)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-1">Dampak Lingkungan</h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $data->environmental_impact }}
                            </p>
                        </div>
                    @endif
                    @if ($data->raw_ai_response)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-1">JSON response</h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $data->raw_ai_response }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex justify-end border-t border-t-gray-300 mt-2 pt-2">
                <form action="{{ route('admin.ai.destroy', $data->id) }}" method="POST"
                    onsubmit="return confirm('Yakin hapus data ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-2 py-1 bg-red-600 text-white rounded hover:bg-red-500 text-xs font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
