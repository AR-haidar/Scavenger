<x-app-layout>
    <x-slot name="header">
        <div
            class="flex justify-between items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-4">
            <div class="">
                <x-breadcrumb :items="[['label' => 'Klasifikasi AI']]" />
                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    {{ __('Klasifikasi AI') }}
                </h2>
                <span class="text-sm text-gray-400">
                    Total: <strong>{{ $datas->total() }}</strong> Data
                </span>
            </div>

        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-3">

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filter Tabs -->
            <div class="mb-4 border-b border-gray-200 flex justify-between">
                <div class="">
                    <ul class="flex flex-wrap-mb-px text-sm font-medium text-center">
                        <li class="mr-2">
                            <a href="{{ route('admin.ai.index', ['search' => request('search')]) }}"
                                class="inline-block p-4 {{ !request('category') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Semua
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.ai.index', ['category' => 'organik', 'search' => request('search')]) }}"
                                class="inline-block p-4 {{ request('category') == 'organik' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Organik
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.ai.index', ['category' => 'anorganik', 'search' => request('search')]) }}"
                                class="inline-block p-4 {{ request('category') == 'anorganik' ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Anorganik
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.ai.index', ['category' => 'b3', 'search' => request('search')]) }}"
                                class="inline-block p-4 {{ request('category') == 'b3' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                B3
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <form method="GET" action="{{ route('admin.ai.index') }}" class="max-w-md">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </span>

                            <input type="search" name="search" value="{{ request('search') }}"
                                class="w-full pl-9 pr-24 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari data sampah..." />

                            <button type="submit"
                                class="absolute right-1 top-1 bottom-1 px-4 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700">
                                Cari
                            </button>
                        </div>

                        <!-- Hidden input untuk maintain category filter saat search -->
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </form>

                    <!-- Info hasil pencarian (optional) -->
                    @if (request('search'))
                        <div class="mt-3 flex items-center space-x-2 text-sm">
                            <span class="text-gray-600">
                                Hasil pencarian: <strong>"{{ request('search') }}"</strong>
                                @if (request('category'))
                                    di kategori
                                    @if (request('category') == 'organik')
                                        <strong class="text-green-600">{{ ucfirst(request('category')) }}</strong>
                                    @elseif (request('category') == 'anorganik')
                                        <strong class="text-yellow-500">{{ ucfirst(request('category')) }}</strong>
                                    @else
                                        <strong class="text-red-600">{{ ucfirst(request('category')) }}</strong>
                                    @endif
                                @endif
                                ({{ $datas->total() }} item)
                            </span>
                            <a href="{{ route('admin.ai.index', request()->only('category')) }}"
                                class="text-red-600 hover:text-red-800 font-medium">
                                × Hapus
                            </a>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Ai Items Table -->
            @if ($datas->count() > 0)
                <div class="relative overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-sm text-gray-700 bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">

                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Input User
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Nama Sampah
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Kategori sampah
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $datas->firstItem() + $loop->index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="inlie-flex items-center">
                                            @if ($data->input_type == 'image')
                                                <img src="{{ asset($data->input_image_path) }}"
                                                    class="h-32 w-32 rounded object-cover mr-3"
                                                    alt="{{ $data->input_image_path }}">
                                            @else
                                                <div class="text-sm text-gray-900 max-w-xs whitespace-normal">
                                                    {{ $data->input_text }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs whitespace-normal">
                                            {{ $data->waste_name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs whitespace-normal">
                                            {{ $data->user->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($data->category == 'organik')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Organik
                                            </span>
                                        @elseif ($data->category == 'anorganik')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Anorganik
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                B3
                                            </span>
                                        @endif
                                    </td>

                                    <td class="flex items-center px-6 py-4 space-x-3">
                                        {{-- Show --}}
                                        <a href="{{ route('admin.ai.show', $data->id) }}"
                                            class="inline-flex items-center px-2 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 text-xs font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Detail
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.ai.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-2 py-1 bg-red-600 text-white rounded hover:bg-red-500 text-xs font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $datas->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 text-center py-12">
                    @if (request('search'))
                        <!-- No Search Results -->
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada hasil</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Tidak ditemukan data dengan kata kunci "<strong>{{ request('search') }}</strong>"
                            @if (request('category'))
                                di kategori <strong>{{ ucfirst(request('category')) }}</strong>
                            @endif
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('admin.ai.index', request()->only('category')) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 text-sm font-medium">
                                Hapus Pencarian
                            </a>
                        </div>
                    @else
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data klasifikasi AI</h3>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
