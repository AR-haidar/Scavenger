<x-app-layout>
    <x-slot name="header">
        <div
            class="flex justify-between items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-4">
            <div class="">
                <x-breadcrumb :items="[
                    ['label' => 'Sampah'],
                ]" />
                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    {{ __('Data Sampah') }}
                </h2>
                <span class="text-sm text-gray-400">
                    Total: <strong>{{ $wastes->total() }}</strong> Data
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
                            <a href="{{ route('admin.waste.index') }}"
                                class="inline-block p-4 {{ !request('category') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Semua
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.waste.index', ['category' => 'organik']) }}"
                                class="inline-block p-4 {{ request('category') == 'organik' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Organik
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.waste.index', ['category' => 'anorganik']) }}"
                                class="inline-block p-4 {{ request('category') == 'anorganik' ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                Anorganik
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{ route('admin.waste.index', ['category' => 'b3']) }}"
                                class="inline-block p-4 {{ request('category') == 'b3' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 hover:text-gray-600 hover:border-gray-300' }}">
                                B3
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="inline-flex items-center">
                    <a href="{{ route('admin.waste.create') }}"
                        class="inline-flex items-center w-auto shrink-0 px-3 py-1.5 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition font-extrabold">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah
                    </a>
                </div>

            </div>

            <!-- Waste Items Table -->
            @if ($wastes->count() > 0)
                <div class="relative overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-sm text-gray-700 bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">

                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wastes as $waste)
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $wastes->firstItem() + $loop->index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="inlie-flex items-center">
                                            @if ($waste->image_path)
                                                <img src="{{ asset('storage/'. $waste->image_path) }}"
                                                    class="h-32 w-32 rounded object-cover mr-3">
                                            @else
                                                <div
                                                    class="h-32 w-32 rounded bg-gray-200 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif

                                            <span class="text-gray-900 font-extrabold">
                                                {{ $waste->name }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($waste->category == 'organik')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Organik
                                            </span>
                                        @elseif ($waste->category == 'anorganik')
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
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs whitespace-normal">
                                            {{ Str::limit($waste->description, 100) }}
                                        </div>
                                    </td>
                                    <td class="flex items-center px-6 py-4 space-x-3">
                                        {{-- Show --}}
                                        <a href="{{ route('admin.waste.show', $waste->id) }}"
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

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.waste.edit', $waste->id) }}"
                                            class="inline-flex items-center px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-500 text-xs font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.waste.destroy', $waste->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus item ini?')" class="inline">
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
                    {{ $wastes->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data sampah</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat data sampah baru</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.waste.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add sampah baru
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
