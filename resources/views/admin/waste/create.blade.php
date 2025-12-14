<x-app-layout>
    <x-slot name="header">
        <div
            class="flex justify-between items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-4">
            <div>
                <x-breadcrumb :items="[['label' => 'Sampah', 'url' => route('admin.waste.index')], ['label' => 'Tambah']]" />

                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    {{ __('Tambah Item Sampah Baru') }}
                </h2>
                <span class="text-sm text-gray-400">
                    Buat entri item sampah baru
                </span>
            </div>
            <a href="{{ route('admin.waste.index') }}"
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

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.waste.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gird-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">
                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Sampah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="contoh: Botol Plastik PET" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="category" id="category"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('category') ? 'border-red-500' : 'border-gray-300' }}"
                                required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="organik" {{ old('category') == 'organik' ? 'selected' : '' }}>Organik
                                </option>
                                <option value="anorganik" {{ old('category') == 'anorganik' ? 'selected' : '' }}>
                                    Anorganik
                                </option>
                                <option value="b3" {{ old('category') == 'b3' ? 'selected' : '' }}>B3 (Bahan
                                    Berbahaya & Beracun)</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi
                            </label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Deskripsi singkat tentang item sampah">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Composition -->
                        <div class="mb-6">
                            <label for="composition" class="block text-sm font-medium text-gray-700 mb-2">
                                Komposisi / Material
                            </label>
                            <textarea name="composition" id="composition" rows="2"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('composition') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="contoh: PET (Polyethylene Terephthalate)">{{ old('composition') }}</textarea>
                            @error('composition')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Environmental Impact -->
                        <div class="mb-6">
                            <label for="impact" class="block text-sm font-medium text-gray-700 mb-2">
                                Dampak Lingkungan
                            </label>
                            <textarea name="impact" id="impact" rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('impact') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Jelaskan dampak lingkungan jika tidak dikelola dengan baik">{{ old('impact') }}</textarea>
                            @error('impact')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Handling Recommendation -->
                        <div class="mb-6">
                            <label for="handling" class="block text-sm font-medium text-gray-700 mb-2">
                                Rekomendasi Penanganan
                            </label>
                            <textarea name="handling" id="handling" rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('handling') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Cara menangani dan membuang sampah ini dengan benar">{{ old('handling') }}</textarea>
                            @error('handling')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Recycling Potential -->
                        <div class="mb-6">
                            <label for="recycling" class="block text-sm font-medium text-gray-700 mb-2">
                                Potensi Daur Ulang
                            </label>
                            <textarea name="recycling" id="recycling" rows="2"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('recycling') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Sampah ini dapat didaur ulang menjadi apa?">{{ old('recycling') }}</textarea>
                            @error('recycling')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Sampah
                            </label>

                            <div class="mt-2 flex flex-col space-y-3">

                                <!-- PREVIEW -->
                                <div id="image-preview" class="hidden">
                                    <img id="preview-img" src="" alt="Preview"
                                        class="h-full w-full object-cover rounded-lg border border-gray-300 aspect-square">
                                </div>

                                <!-- FORMAT INFO -->
                                <p class="text-xs text-gray-500">
                                    JPG, JPEG, PNG — Maksimal 2MB
                                </p>

                                <!-- BUTTON -->
                                <label for="image"
                                    class="cursor-pointer inline-flex w-fit items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Pilih Gambar
                                </label>

                                <input type="file" name="image" id="image"
                                    accept="image/jpeg,image/png,image/jpg" class="hidden"
                                    onchange="previewImage(event)">
                            </div>

                            @error('image')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>


                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.waste.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 text-sm font-medium">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-extrabold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        BUAT ITEM SAMPAH
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image-preview');
                    const img = document.getElementById('preview-img');
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
