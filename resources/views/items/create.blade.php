<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Kode -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kode</label>
                        <input type="text" name="code" value="{{ old('code') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('code') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Deskripsi</label>
                        <textarea name="description" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                        @error('description') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Gambar</label>
                        <input type="file" name="image"
                               class="w-full border rounded px-3 py-2">
                        @error('image') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Jenis -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Jenis</label>
                        <select name="type" class="w-full border rounded px-3 py-2">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Bahan Baku" {{ old('type') == 'Bahan Baku' ? 'selected' : '' }}>Bahan Baku</option>
                            <option value="Packaging" {{ old('type') == 'Packaging' ? 'selected' : '' }}>Packaging</option>
                            <option value="Produk Jadi" {{ old('type') == 'Produk Jadi' ? 'selected' : '' }}>Produk Jadi</option>
                        </select>
                        @error('type') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Stok</label>
                        <input type="number" name="stock" value="{{ old('stock', 0) }}"
                               class="w-full border rounded px-3 py-2">
                        @error('stock') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Harga</label>
                        <input type="number" name="price" value="{{ old('price', 0) }}" step="0.01"
                               class="w-full border rounded px-3 py-2">
                        @error('price') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Simpan
                        </button>
                        <a href="{{ route('items.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>